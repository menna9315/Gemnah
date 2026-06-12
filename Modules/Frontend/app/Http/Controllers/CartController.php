<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Backend\Models\ProductItem;
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

        if ($item->is_out_of_stock || (int) $item->stock_quantity <= 0) {
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
}
