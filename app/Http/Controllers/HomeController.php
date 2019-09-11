<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use App\Type;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        $brands = Brand::all();
        $products = Product::orderBy('id', 'desc')->take(10)->get();

        return view('layouts.frontoffice.home')->with('types', $types)->with('brands', $brands)->with('products', $products);
    }

    public function search(Request $request)
    {
        $parameters = $request->request->all();
        $product_name = $parameters['name'];

        unset($parameters['name']);

        $products = Product::where('name', 'like', '%' . $product_name . '%');

        $types = Type::all();
        $brands = Brand::all();

        return view('layouts.frontoffice.home')->with('types', $types)->with('brands', $brands)->with('products', $products);
    }

}
