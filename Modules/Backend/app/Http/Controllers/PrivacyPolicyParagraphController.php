<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Backend\Models\PrivacyPolicyParagraph;

class PrivacyPolicyParagraphController
{
    public function index()
    {
        $items = PrivacyPolicyParagraph::orderBy('paragraph_order')->latest()->paginate(10);

        return view('backend::privacy-policy.index', compact('items'));
    }

    public function create()
    {
        return view('backend::privacy-policy.create', [
            'privacyPolicyParagraph' => new PrivacyPolicyParagraph(),
        ]);
    }

    public function store(Request $request)
    {
        PrivacyPolicyParagraph::create($this->validatedData($request));

        return redirect()
            ->route('backend.privacy-policy.index')
            ->with('success', 'Privacy policy paragraph created successfully.');
    }

    public function edit(PrivacyPolicyParagraph $privacyPolicyParagraph)
    {
        return view('backend::privacy-policy.edit', compact('privacyPolicyParagraph'));
    }

    public function update(Request $request, PrivacyPolicyParagraph $privacyPolicyParagraph)
    {
        $privacyPolicyParagraph->update($this->validatedData($request));

        return redirect()
            ->route('backend.privacy-policy.index')
            ->with('success', 'Privacy policy paragraph updated successfully.');
    }

    public function destroy(PrivacyPolicyParagraph $privacyPolicyParagraph)
    {
        $privacyPolicyParagraph->delete();

        return redirect()
            ->route('backend.privacy-policy.index')
            ->with('success', 'Privacy policy paragraph deleted successfully.');
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
