<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'page_title' => __("Contact Page")
        ];
        return view('pages.contact.index', $data);
    }
}
