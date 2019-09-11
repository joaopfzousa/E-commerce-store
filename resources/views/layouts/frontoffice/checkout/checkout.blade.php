@extends('layouts.frontoffice')

@section('content')
    <div class="privacy py-sm-5 py-4">
        <div class="container py-xl-4 py-lg-2">
            <!-- tittle heading -->
            <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                <span>C</span>heckout
            </h3>
            <!-- //tittle heading -->
            <div class="checkout-right">
                <h4 class="mb-sm-4 mb-3">Your shopping cart contains:
                    <span>{{ count($order_details) }} Products</span>
                </h4>
                <div class="table-responsive">
                    <table class="timetable_sub">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Product Name</th>

                            <th>Price</th>

                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach($order_details as $order_index => $order_detail)
                            <tr class="rem{{$i}}">
                                <td class="invert-image">
                                    <img src="{{ $order_detail['picture']->picture }}" alt=" " class="img-responsive">
                                </td>
                                <td class="invert">
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <div class="entry value">
                                                <span>{{ $order_detail['quantity'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="invert">{{ $order_index }}</td>
                                <td class="invert">{{ $order_detail['quantity'] * $order_detail['unit_price'] }}€</td>

                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="checkout-left">
                <div class="address_form_agile mt-sm-5 mt-4">
                    <div class="checkout-right-basket">
                        <form method="post" action="{{ route('place-order') }}">
                            @csrf
                            <input type="hidden" name="order_details" value="{{ json_encode($order_details) }}">
                            <button type="submit">Place order
                                <span class="far fa-hand-point-right"></span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //checkout page -->
@endsection