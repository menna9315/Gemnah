<?php

namespace Modules\Frontend\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Modules\Backend\Models\ProductItem;
use Modules\Frontend\Models\Cart;
use Modules\Frontend\Models\CartItem;

class CartManager
{
    public function currentCart(bool $create = false): ?Cart
    {
        $customer = Auth::guard('customer')->user();
        $sessionId = session()->getId();

        if ($customer) {
            $cart = Cart::query()
                ->where('customer_id', $customer->id)
                ->where('status', 'active')
                ->latest()
                ->first();

            if ($cart) {
                return $cart;
            }

            $cart = Cart::query()
                ->whereNull('customer_id')
                ->where('session_id', $sessionId)
                ->where('status', 'active')
                ->latest()
                ->first();

            if ($cart) {
                $cart->update(['customer_id' => $customer->id]);

                return $cart;
            }
        } elseif ($sessionId) {
            $cart = Cart::query()
                ->where('session_id', $sessionId)
                ->where('status', 'active')
                ->latest()
                ->first();

            if ($cart) {
                return $cart;
            }
        }

        if (! $create) {
            return null;
        }

        return Cart::create([
            'customer_id' => $customer?->id,
            'session_id' => $sessionId,
            'status' => 'active',
            'currency' => 'EGP',
            'subtotal' => 0,
        ]);
    }

    public function addItem(ProductItem $productItem, int $quantity = 1): Cart
    {
        $quantity = max(1, $quantity);
        $cart = $this->currentCart(create: true);
        $unitPrice = $this->unitPrice($productItem);

        $cartItem = $cart->items()
            ->where('product_item_id', $productItem->id)
            ->first();

        $newQuantity = $quantity + (int) ($cartItem?->quantity ?? 0);

        if ((int) $productItem->stock_quantity > 0 && $newQuantity > (int) $productItem->stock_quantity) {
            throw ValidationException::withMessages([
                'quantity' => 'Only '.$productItem->stock_quantity.' item(s) are available in stock.',
            ]);
        }

        $cart->items()->updateOrCreate(
            ['product_item_id' => $productItem->id],
            [
                'quantity' => $newQuantity,
                'unit_price' => $unitPrice,
                'total_price' => number_format($unitPrice * $newQuantity, 2, '.', ''),
            ]
        );

        return $this->refreshSubtotal($cart);
    }

    public function updateItemQuantity(CartItem $cartItem, int $quantity): Cart
    {
        $quantity = max(1, $quantity);
        $cartItem->loadMissing('productItem');
        $productItem = $cartItem->productItem;

        if ((int) $productItem->stock_quantity > 0 && $quantity > (int) $productItem->stock_quantity) {
            throw ValidationException::withMessages([
                'quantity' => 'Only '.$productItem->stock_quantity.' item(s) are available in stock.',
            ]);
        }

        $unitPrice = $this->unitPrice($productItem);

        $cartItem->update([
            'quantity' => $quantity,
            'unit_price' => $unitPrice,
            'total_price' => number_format($unitPrice * $quantity, 2, '.', ''),
        ]);

        return $this->refreshSubtotal($cartItem->cart);
    }

    public function removeItem(CartItem $cartItem): Cart
    {
        $cart = $cartItem->cart;

        $cartItem->delete();

        return $this->refreshSubtotal($cart);
    }

    public function count(): int
    {
        $cart = $this->currentCart();

        if (! $cart) {
            return 0;
        }

        return (int) $cart->items()->sum('quantity');
    }

    public function cartWithItems(): ?Cart
    {
        return $this->currentCart()?->load([
            'items.productItem.color',
            'items.productItem.size',
            'items.productItem.product.category',
        ]);
    }

    public function refreshSubtotal(Cart $cart): Cart
    {
        $subtotal = $cart->items()->sum('total_price');

        $cart->forceFill([
            'subtotal' => number_format((float) $subtotal, 2, '.', ''),
        ])->save();

        return $cart->refresh();
    }

    public function unitPrice(ProductItem $productItem): float
    {
        $priceAfterDiscount = (float) $productItem->price_after_discount;

        if ($priceAfterDiscount > 0) {
            return $priceAfterDiscount;
        }

        return (float) $productItem->selling_price;
    }
}
