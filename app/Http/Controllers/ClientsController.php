<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientsController extends Controller
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
        return view('layouts.backoffice.clients.clients')->with('clients', Client::all());
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        return view('layouts.backoffice.clients.client');
    }

    /**
     * Create a new client instance after a valid insertion.
     *
     * @param  Request $request
     * @return \App\Clients
     */
    public function create(Request $request)
    {
        $data = $request->post();

        $request->validate([
            'name' => 'required|max:255',
            'adress' => 'required|max:255',
            'vat_numeber'=>'required|max:11|min:11',
            'phone_number' => 'required|max:9|min:9'
        ]);

        Client::create([
            'name' => $data['name'],
            'address' => $data['address'],
            'vat_numeber' => $data['vat_numeber'],
            'phone_number' => $data['phone_number'],
        ]);

        return redirect()->route('clients');
    }

    public function edit(Client $client)
    {
        return view('layouts.backoffice.clients.edit_client', [
            'client' => $client
        ]);
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
            'vat_numeber'=>'required|max:11|min:11',
            'phone_number' => 'required|max:9|min:9'
        ]);

        $client = Client::find($request->get('client_id'));

        $client->update([
            'name' => $request->get('name'),
            'adress' =>  $request->get('adress'),
            'vat_numeber' =>  $request->get('vat_numeber'),
            'phone_number' =>  $request->get('phone_number')
        ]);

        return redirect()->route('clients');
    }
}

