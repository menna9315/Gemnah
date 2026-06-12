<?php

namespace Modules\Backend\Http\Controllers;

use Modules\Backend\Models\ContactMessage;

class ContactMessageController
{
    public function index()
    {
        $messages = ContactMessage::latest()->paginate(10);

        return view('backend::contact-messages.index', compact('messages'));
    }

    public function show(ContactMessage $contactMessage)
    {
        return view('backend::contact-messages.show', compact('contactMessage'));
    }

    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();

        return redirect()
            ->route('backend.contact-messages.index')
            ->with('success', 'Contact message deleted successfully.');
    }
}
