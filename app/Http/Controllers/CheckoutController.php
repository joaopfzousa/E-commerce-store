<?php

namespace App\Http\Controllers;



class CheckoutController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('layouts.frontoffice.checkout.checkout');
    }

}
