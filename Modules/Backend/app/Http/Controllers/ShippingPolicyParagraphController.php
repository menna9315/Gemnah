<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Backend\Models\ShippingPolicyParagraph;

class ShippingPolicyParagraphController
{
    public function index()
    {
        $items = ShippingPolicyParagraph::orderBy('paragraph_order')->latest()->paginate(10);

        return view('backend::shipping-policy.index', compact('items'));
    }

    public function create()
    {
        return view('backend::shipping-policy.create', [
            'shippingPolicyParagraph' => new ShippingPolicyParagraph(),
        ]);
    }

    public function store(Request $request)
    {
        ShippingPolicyParagraph::create($this->validatedData($request));

        return redirect()
            ->route('backend.shipping-policy.index')
            ->with('success', 'Shipping policy paragraph created successfully.');
    }

    public function edit(ShippingPolicyParagraph $shippingPolicyParagraph)
    {
        return view('backend::shipping-policy.edit', compact('shippingPolicyParagraph'));
    }

    public function update(Request $request, ShippingPolicyParagraph $shippingPolicyParagraph)
    {
        $shippingPolicyParagraph->update($this->validatedData($request));

        return redirect()
            ->route('backend.shipping-policy.index')
            ->with('success', 'Shipping policy paragraph updated successfully.');
    }

    public function destroy(ShippingPolicyParagraph $shippingPolicyParagraph)
    {
        $shippingPolicyParagraph->delete();

        return redirect()
            ->route('backend.shipping-policy.index')
            ->with('success', 'Shipping policy paragraph deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'paragraph_order' => ['nullable', 'integer'],
        ]);
    }
}
