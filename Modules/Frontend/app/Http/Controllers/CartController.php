<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Modules\Backend\Models\ProductItem;
use Modules\Frontend\Models\CartItem;
use Modules\Frontend\Services\CartManager;

class CartController
{
    public function __construct(private readonly CartManager $cartManager)
    {
    }

    public function store(Request $request, ProductItem $item)
    {
        $item->load('product.category.collection');

        abort_unless($item->show_in_store, 404);
        abort_unless($item->product?->show_in_store, 404);
        abort_unless($item->product?->category?->show_in_store, 404);
        abort_unless($item->product?->category?->collection?->show_in_store, 404);

        $data = $request->validate([
            'quantity' => ['nullable', 'integer', 'min:1', 'max:99'],
            'redirect_to' => ['nullable', 'in:cart,checkout'],
        ]);

        if ($item->is_out_of_stock) {
            return back()
                ->withErrors(['cart' => 'This item is out of stock.'])
                ->withInput();
        }

        $this->cartManager->addItem($item, (int) ($data['quantity'] ?? 1));

        if (($data['redirect_to'] ?? 'cart') === 'checkout') {
            return redirect()->route('frontend.checkout');
        }

        return back()
            ->with('success', 'Item added to cart.')
            ->with('cart_open', true);
    }

    public function update(Request $request, CartItem $cartItem)
    {
        $cart = $this->cartManager->currentCart();

        abort_unless($cart && (int) $cartItem->cart_id === (int) $cart->id, 404);

        $data = $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:99'],
        ]);

        try {
            $updatedCart = $this->cartManager->updateItemQuantity($cartItem, (int) $data['quantity']);
        } catch (ValidationException $exception) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => collect($exception->errors())->flatten()->first(),
                    'errors' => $exception->errors(),
                ], 422);
            }

            return back()
                ->withErrors($exception->errors())
                ->with('cart_open', true);
        }

        if ($request->expectsJson()) {
            $cartItem->refresh()->load('productItem');
            $quantity = (int) $cartItem->quantity;
            $quantityMax = (int) $cartItem->productItem?->stock_quantity > 0
                ? min((int) $cartItem->productItem->stock_quantity, 99)
                : 99;
            $cartCount = (int) $updatedCart->items()->sum('quantity');

            return response()->json([
                'quantity' => $quantity,
                'quantity_min' => 1,
                'quantity_max' => $quantityMax,
                'decrease_quantity' => max(1, $quantity - 1),
                'increase_quantity' => min($quantityMax, $quantity + 1),
                'can_decrease' => $quantity > 1,
                'can_increase' => $quantity < $quantityMax,
                'line_total' => 'EGP '.number_format((float) $cartItem->total_price, 2),
                'subtotal' => 'EGP '.number_format((float) $updatedCart->subtotal, 2),
                'cart_count' => $cartCount,
                'checkout_text' => 'Checkout'.($cartCount ? ' ('.$cartCount.')' : ''),
            ]);
        }

        return back()->with('cart_open', true);
    }
}
