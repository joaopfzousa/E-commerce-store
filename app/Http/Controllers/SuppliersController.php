<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

class SuppliersController extends Controller
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
        return view('layouts.backoffice.suppliers.suppliers')->with('suppliers', Supplier::all());
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        return view('layouts.backoffice.suppliers.supplier');
    }

    /**
     * Create a new supplier instance after a valid insertion.
     *
     * @param  Request $request
     * @return \App\Supplier
     */
    public function create(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'adress' => 'required|max:255',
            'phone_number' => 'required|max:9|min:9'
        ]);

        $data = $request->post();

        Supplier::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'adress' => $data['adress'],
            'phone_number' => $data['phone_number'],
        ]);

        return redirect()->route('suppliers');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('layouts.backoffice.suppliers.edit_supplier', [
            'supplier' => $supplier
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
            'email' => 'required|email',
            'adress' => 'required|max:255',
            'phone_number' => 'required|max:9|min:9'
        ]);

        $supplier = Supplier::find($request->get('supplier_id'));

        $supplier->update([
            'name' => $request->get('name'),
            'email' =>  $request->get('email'),
            'adress' =>  $request->get('adress'),
            'phone_number' =>  $request->get('phone_number')
        ]);

        return redirect()->route('suppliers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier $supplier
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('suppliers');
    }

}
