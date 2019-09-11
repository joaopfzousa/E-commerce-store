<?php

namespace App\Http\Controllers;

use App\Client;
use App\Mail\SendReceipt;
use App\Order;
use App\OrderDetails;
use App\Payments;
use App\Product;
use App\Facades\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Mail;

class OrdersController extends Controller
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
     * Create a new type instance after a valid insertion.
     *
     * @param  Request $request
     * @return \App\Brands
     */
    public function create(Request $request)
    {
        $data = $request->post();

        $order_total_price = 0;
        //pega numa string e passa para uma variavel, podemos pegar nessa variavel e aceder as propriedades da estrututa jason
        $order_details = json_decode($data['order_details']);

        foreach ($order_details as $order_detail) {
            $order_total_price += $order_detail->total_price;
        }

        $order = Order::create([
            'client_id' => Client::where('user_id', Auth::user()->id)->first()->id,
            'state' => 'pending',
            'amount' => $order_total_price
        ]);

        foreach ($order_details as $product_name => $product_detail) {
            //vais buscar o id de cada nome do produto
            $product_id = Product::where('name', $product_name)->get()->first()->id;

            //para cada produto
            OrderDetails::create([
                'order_id' => $order->id,
                'product_id' => $product_id,
                'quantity' => $product_detail->quantity
            ]);
        }

        $payment = Payments::create([
            'order_id' => $order->id,
            'entity' => '99999',
            'reference' => Payment::getPaymentReference('99999', '999', $order_total_price, $order->id),
            'total_price' => $order_total_price,
            'status' => 'pending'
        ]);

        Mail::to(Auth::user()->email)->send(new SendReceipt());

        return view('layouts.frontoffice.payment.place_order')->with('payment',$payment );
    }



}

