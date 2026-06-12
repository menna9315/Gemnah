<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Backend\Models\TermsConditionsParagraph;

class TermsConditionsParagraphController
{
    public function index()
    {
        $items = TermsConditionsParagraph::orderBy('paragraph_order')->latest()->paginate(10);

        return view('backend::terms-conditions.index', compact('items'));
    }

    public function create()
    {
        return view('backend::terms-conditions.create', [
            'termsConditionsParagraph' => new TermsConditionsParagraph(),
        ]);
    }

    public function store(Request $request)
    {
        TermsConditionsParagraph::create($this->validatedData($request));

        return redirect()
            ->route('backend.terms-conditions.index')
            ->with('success', 'Terms and conditions paragraph created successfully.');
    }

    public function edit(TermsConditionsParagraph $termsConditionsParagraph)
    {
        return view('backend::terms-conditions.edit', compact('termsConditionsParagraph'));
    }

    public function update(Request $request, TermsConditionsParagraph $termsConditionsParagraph)
    {
        $termsConditionsParagraph->update($this->validatedData($request));

        return redirect()
            ->route('backend.terms-conditions.index')
            ->with('success', 'Terms and conditions paragraph updated successfully.');
    }

    public function destroy(TermsConditionsParagraph $termsConditionsParagraph)
    {
        $termsConditionsParagraph->delete();

        return redirect()
            ->route('backend.terms-conditions.index')
            ->with('success', 'Terms and conditions paragraph deleted successfully.');
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
