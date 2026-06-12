<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Backend\Models\ExchangeRefundPolicyParagraph;

class ExchangeRefundPolicyParagraphController
{
    public function index()
    {
        $items = ExchangeRefundPolicyParagraph::orderBy('paragraph_order')->latest()->paginate(10);

        return view('backend::exchange-refund-policy.index', compact('items'));
    }

    public function create()
    {
        return view('backend::exchange-refund-policy.create', [
            'exchangeRefundPolicyParagraph' => new ExchangeRefundPolicyParagraph(),
        ]);
    }

    public function store(Request $request)
    {
        ExchangeRefundPolicyParagraph::create($this->validatedData($request));

        return redirect()
            ->route('backend.exchange-refund-policy.index')
            ->with('success', 'Exchange and refund policy paragraph created successfully.');
    }

    public function edit(ExchangeRefundPolicyParagraph $exchangeRefundPolicyParagraph)
    {
        return view('backend::exchange-refund-policy.edit', compact('exchangeRefundPolicyParagraph'));
    }

    public function update(Request $request, ExchangeRefundPolicyParagraph $exchangeRefundPolicyParagraph)
    {
        $exchangeRefundPolicyParagraph->update($this->validatedData($request));

        return redirect()
            ->route('backend.exchange-refund-policy.index')
            ->with('success', 'Exchange and refund policy paragraph updated successfully.');
    }

    public function destroy(ExchangeRefundPolicyParagraph $exchangeRefundPolicyParagraph)
    {
        $exchangeRefundPolicyParagraph->delete();

        return redirect()
            ->route('backend.exchange-refund-policy.index')
            ->with('success', 'Exchange and refund policy paragraph deleted successfully.');
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
