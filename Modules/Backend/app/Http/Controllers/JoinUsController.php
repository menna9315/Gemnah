<?php

namespace Modules\Backend\Http\Controllers;

use Modules\Backend\Models\JoinUs;

class JoinUsController
{
    public function index()
    {
        $items = JoinUs::latest()->paginate(15);

        return view('backend::join-us.index', compact('items'));
    }
}
