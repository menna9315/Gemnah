<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Modules\Backend\Models\ShippingFee;

class ShippingFeeController
{
    public function index()
    {
        $shippingFees = ShippingFee::query()
            ->orderBy('city')
            ->get();

        return view('backend::shipping-fees.index', compact('shippingFees'));
    }

    public function create()
    {
        return view('backend::shipping-fees.create', $this->formData(
            new ShippingFee([
                'city' => 'Cairo',
                'amount' => 0,
            ]),
        ));
    }

    public function store(Request $request)
    {
        ShippingFee::create($this->validatedData($request));

        return redirect()
            ->route('backend.shipping-fees.index')
            ->with('success', 'Shipping fee created successfully.');
    }

    public function edit(ShippingFee $shippingFee)
    {
        return view('backend::shipping-fees.edit', $this->formData($shippingFee));
    }

    public function update(Request $request, ShippingFee $shippingFee)
    {
        $shippingFee->update($this->validatedData($request, $shippingFee));

        return redirect()
            ->route('backend.shipping-fees.index')
            ->with('success', 'Shipping fee updated successfully.');
    }

    private function formData(ShippingFee $shippingFee): array
    {
        return [
            'shippingFee' => $shippingFee,
            'cities' => ShippingFee::egyptCities(),
        ];
    }

    private function validatedData(Request $request, ?ShippingFee $shippingFee = null): array
    {
        return $request->validate([
            'city' => [
                'required',
                'string',
                'max:255',
                Rule::in(ShippingFee::egyptCities()),
                Rule::unique('shipping_fees', 'city')->ignore($shippingFee?->id),
            ],
            'amount' => ['required', 'numeric', 'min:0', 'max:99999999.99'],
        ]);
    }
}
