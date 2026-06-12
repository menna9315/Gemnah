<?php

namespace Modules\Backend\Http\Controllers;

class DashboardController
{
    public function __invoke()
    {
        return view('backend::dashboard');
    }
}
