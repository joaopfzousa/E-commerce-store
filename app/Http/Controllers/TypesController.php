<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypesController extends Controller
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
        return view('layouts.backoffice.types.types')->with('types', Type::all());
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        return view('layouts.backoffice.types.type');
    }

    /**
     * Create a new type instance after a valid insertion.
     *
     * @param  Request $request
     * @return \App\Brands
     */
    public function create(Request $request)
    {
        $data = $request->post();

        $request->validate([
            'name' => 'required|max:255'
        ]);

        Type::create([
            'name' => $data['name'],
        ]);

        return redirect()->route('types');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('layouts.backoffice.types.edit_type', [
            'type' => $type
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
            'name' => 'required|max:255'
        ]);

        $type = Type::find($request->get('type_id'));

        $type->update([
            'name' => $request->get('name')
        ]);

        return redirect()->route('types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type $type
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('types');
    }

}

