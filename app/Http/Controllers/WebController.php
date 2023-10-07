<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('web.index', compact('setting'));
    }
}
