<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class BrandsController extends Controller
{
    /**
     * Create a new controller instance.
     * Se nao estiver o login vai para o login
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
        //as brands vai ter todas as brands da base de dados na view
        return view('layouts.backoffice.brands.brands')->with('brands', Brand::all());
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        return view('layouts.backoffice.brands.brand');
    }

    /**
     * Create a new brand instance after a valid insertion.
     *
     * @param  Request $request
     * @return \App\Brands
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);

        //submissao do formulario
        $data = $request->post();

        Brand::create([
            'name' => $data['name'],
        ]);

        return redirect()->route('brands');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //vamos buscar a instancia da brand do brand_id passado no url
        return view('layouts.backoffice.brands.edit_brand', [
            'brand' => $brand
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255'
        ]);

        $brand = Brand::find($request->get('brand_id'));

        $brand->update([
            'name' => $request->get('name')
        ]);

        return redirect()->route('brands');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand $brand
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('brands');
    }
}


