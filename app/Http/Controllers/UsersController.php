<?php

namespace App\Http\Controllers;

use App\Client;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = User::find(Auth::id());
        $client = Client::where('user_id', Auth::id())->get()->first();

        return view('layouts.frontoffice.users.user_details')->with('user', $user)->with('client', $client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'adress' => 'required|max:255',
            'vat_numeber' => 'required|max:9|min:9',
            'phone_number' => 'required|max:9|min:9'
        ]);

        User::where('id', Auth::id())
            ->update(['name' => $request->get('name')]);

        Client::updateOrCreate(
            ['user_id' => Auth::id()],
            ['user_id' => Auth::id(),
                'adress' =>  $request->get('adress'),
                'vat_numeber' => $request->get('vat_numeber'),
                'phone_number' =>  $request->get('phone_number')
            ]);

        return redirect()->route('user-details');
    }

}


