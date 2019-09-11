<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use App\Supplier;
use App\Type;
use Illuminate\Http\Request;

class ProductsController extends Controller
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
        $products = Product::all();
        return view('layouts.backoffice.products.products')->with('products', $products);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        $brands = Brand::all();
        $suppliers = Supplier::all();
        $types = Type::all();

        return view('layouts.backoffice.products.product')->with('brands', $brands)->with('suppliers', $suppliers)->with('types', $types);
    }

    /**
     * Create a new client instance after a valid insertion.
     *
     * @param  Request $request
     * @return \App\Products
     */
    public function create(Request $request)
    {
        $data = $request->post();

        $request->validate([
            'brand' => 'required',
            'supplier' => 'required',
            'type' => 'required',
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required',
            'stock' => 'required',
            'picture' => 'required',
        ]);

        $picture = 'data:image/' . $request->allFiles()['picture']->getClientMimeType() . ';base64,' .
            base64_encode($request->allFiles()['picture']->get());

        $brand = Brand::find($data['brand']);
        $supplier = Supplier::find($data['supplier']);
        $type = Type::find($data['type']);

        $product = new Product([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'stock' => $data['stock'],
            'picture' => $picture
        ]);

        $product->brand()->associate($brand);
        $product->supplier()->associate($supplier);
        $product->type()->associate($type);
        $product->save();

        return redirect()->route('products');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $brands = Brand::all();
        $suppliers = Supplier::all();
        $types = Type::all();


        return view('layouts.backoffice.products.edit_product', [
            'product' => $product,
            'brands' => $brands,
            'suppliers' => $suppliers,
            'types' => $types
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
            'brand' => 'required',
            'supplier' => 'required',
            'type' => 'required',
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required',
            'stock' => 'required',
            'picture' => 'required',
        ]);


        $product = Product::find($request->get('product_id'));

        $picture = 'data:image/' . $request->allFiles()['picture']->getClientMimeType() . ';base64,' .
            base64_encode($request->allFiles()['picture']->get());

        $product->update([
            'brand_id' => $request->get('brand'),
            'supplier_id' => $request->get('supplier'),
            'type_id' => $request->get('type'),
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'stock' => $request->get('stock'),
            'picture' => $picture,
        ]);

        return redirect()->route('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products');
    }

}


