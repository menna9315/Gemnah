<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Backend\Models\ShippingFee;

class ShippingFeeController
{
    public function index()
    {
        $shippingFee = ShippingFee::first();

        return view('backend::shipping-fees.index', compact('shippingFee'));
    }

    public function create()
    {
        if ($shippingFee = ShippingFee::first()) {
            return redirect()->route('backend.shipping-fees.edit', $shippingFee);
        }

        return view('backend::shipping-fees.create', [
            'shippingFee' => new ShippingFee([
                'city' => 'Alexandria',
                'amount' => 0,
            ]),
        ]);
    }

    public function store(Request $request)
    {
        if ($shippingFee = ShippingFee::first()) {
            return redirect()->route('backend.shipping-fees.edit', $shippingFee)
                ->with('success', 'Shipping fee already exists. You can edit it here.');
        }

        ShippingFee::create($this->validatedData($request));

        return redirect()
            ->route('backend.shipping-fees.index')
            ->with('success', 'Shipping fee created successfully.');
    }

    public function edit(ShippingFee $shippingFee)
    {
        return view('backend::shipping-fees.edit', compact('shippingFee'));
    }

    public function update(Request $request, ShippingFee $shippingFee)
    {
        $shippingFee->update($this->validatedData($request));

        return redirect()
            ->route('backend.shipping-fees.index')
            ->with('success', 'Shipping fee updated successfully.');
    }

    private function validatedData(Request $request): array
    {
        $request->merge([
            'city' => 'Alexandria',
        ]);

        return $request->validate([
            'city' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'numeric', 'min:0', 'max:99999999.99'],
        ]);
    }
}
