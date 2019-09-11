<?php

namespace App\Http\Controllers;

class ContactController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('layouts.frontoffice.contact.contact');
    }

}
