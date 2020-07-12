<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'page_title' => __("About Page")
        ];
        return view('pages.about.index', $data);
    }
}
