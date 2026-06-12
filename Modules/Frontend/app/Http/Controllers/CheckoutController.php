<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Modules\Backend\Models\ShippingFee;
use Modules\Frontend\Models\Order;
use Modules\Frontend\Services\CartManager;

class CheckoutController
{
    public function __construct(private readonly CartManager $cartManager)
    {
    }

    public function show()
    {
        $cart = $this->cartManager->cartWithItems();
        $customer = Auth::guard('customer')->user();
        $shippingAmount = $this->shippingAmount();
        $cartSubtotal = (float) ($cart?->subtotal ?? 0);
        $checkoutTotal = $cartSubtotal + $shippingAmount;

        return view('frontend::pages.checkout', compact('cart', 'customer', 'shippingAmount', 'checkoutTotal'));
    }

    public function store(Request $request)
    {
        $cart = $this->cartManager->cartWithItems();

        if (! $cart || $cart->items->isEmpty()) {
            throw ValidationException::withMessages([
                'cart' => 'Your cart is empty.',
            ]);
        }

        $request->merge([
            'city' => 'Alexandria',
        ]);

        $data = $request->validate([
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_email' => ['required', 'email', 'max:255'],
            'customer_phone' => ['required', 'string', 'max:30'],
            'city' => ['required', 'string', 'max:255'],
            'area' => ['nullable', 'string', 'max:255'],
            'address_line' => ['required', 'string'],
            'notes' => ['nullable', 'string'],
        ]);

        $order = DB::transaction(function () use ($cart, $data) {
            $cart->load([
                'items.productItem.color',
                'items.productItem.size',
                'items.productItem.product',
            ]);

            foreach ($cart->items as $cartItem) {
                $productItem = $cartItem->productItem;

                if (! $productItem || $productItem->is_out_of_stock) {
                    throw ValidationException::withMessages([
                        'cart' => ($productItem?->title ?: 'An item').' is no longer available in the requested quantity.',
                    ]);
                }
            }

            $subtotal = (float) $cart->subtotal;
            $shippingAmount = $this->shippingAmount();
            $totalAmount = $subtotal + $shippingAmount;

            $order = Order::create([
                'order_number' => $this->orderNumber(),
                'customer_id' => $cart->customer_id,
                'session_id' => $cart->session_id,
                'customer_name' => $data['customer_name'],
                'customer_email' => $data['customer_email'],
                'customer_phone' => $data['customer_phone'],
                'status' => 'pending',
                'payment_status' => 'unpaid',
                'payment_method' => 'cash_on_delivery',
                'subtotal' => number_format($subtotal, 2, '.', ''),
                'shipping_amount' => number_format($shippingAmount, 2, '.', ''),
                'discount_amount' => '0.00',
                'tax_amount' => '0.00',
                'total_amount' => number_format($totalAmount, 2, '.', ''),
                'notes' => $data['notes'] ?? null,
                'placed_at' => now(),
            ]);

            $order->shippingAddress()->create([
                'type' => 'shipping',
                'full_name' => $data['customer_name'],
                'phone' => $data['customer_phone'],
                'city' => $data['city'],
                'area' => $data['area'] ?? null,
                'address_line' => $data['address_line'],
                'notes' => $data['notes'] ?? null,
            ]);

            foreach ($cart->items as $cartItem) {
                $productItem = $cartItem->productItem;

                $order->items()->create([
                    'product_item_id' => $productItem->id,
                    'product_title' => $productItem->product?->title,
                    'item_title' => $productItem->title,
                    'item_code' => $productItem->item_code,
                    'color_name' => $productItem->color?->name,
                    'size_value' => $productItem->size?->value,
                    'quantity' => $cartItem->quantity,
                    'unit_price' => $cartItem->unit_price,
                    'total_price' => $cartItem->total_price,
                ]);

                if ((int) $productItem->stock_quantity > 0) {
                    $productItem->decrement('stock_quantity', (int) $cartItem->quantity);
                }
            }

            $cart->update(['status' => 'checked_out']);

            return $order;
        });

        return redirect()->route('frontend.checkout.success', $order);
    }

    public function success(Order $order)
    {
        $order->load('items', 'shippingAddress');

        abort_unless($this->canViewOrder($order), 404);

        return view('frontend::pages.checkout-success', compact('order'));
    }

    private function orderNumber(): string
    {
        do {
            $orderNumber = 'GMN-'.now()->format('YmdHis').'-'.Str::upper(Str::random(4));
        } while (Order::where('order_number', $orderNumber)->exists());

        return $orderNumber;
    }

    private function shippingAmount(): float
    {
        return (float) (ShippingFee::first()?->amount ?? 0);
    }

    private function canViewOrder(Order $order): bool
    {
        $customer = Auth::guard('customer')->user();

        if ($customer && (int) $order->customer_id === (int) $customer->id) {
            return true;
        }

        return $order->session_id && $order->session_id === session()->getId();
    }
}
