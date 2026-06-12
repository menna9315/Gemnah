<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Backend\Models\Contact;

class ContactController
{
    public function index()
    {
        $contact = Contact::first();

        return view('backend::contacts.index', compact('contact'));
    }

    public function create()
    {
        if ($contact = Contact::first()) {
            return redirect()->route('backend.contacts.edit', $contact);
        }

        return view('backend::contacts.create', [
            'contact' => new Contact(),
        ]);
    }

    public function store(Request $request)
    {
        if ($contact = Contact::first()) {
            return redirect()->route('backend.contacts.edit', $contact)
                ->with('success', 'Contact already exists. You can edit it here.');
        }

        Contact::create($this->validatedData($request));

        return redirect()
            ->route('backend.contacts.index')
            ->with('success', 'Contact created successfully.');
    }

    public function edit(Contact $contact)
    {
        return view('backend::contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $contact->update($this->validatedData($request));

        return redirect()
            ->route('backend.contacts.index')
            ->with('success', 'Contact updated successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'phone1' => ['nullable', 'string', 'max:255'],
            'phone2' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'instgram_link' => ['nullable', 'string', 'max:2048'],
            'facebook_link' => ['nullable', 'string', 'max:2048'],
            'tiktok_link' => ['nullable', 'string', 'max:2048'],
        ]);
    }
}
