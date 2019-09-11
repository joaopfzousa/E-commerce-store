@extends('layouts.frontoffice')

@section('content')


    <!-- top Products -->
    <div class="ads-grid py-sm-5 py-4">
        <div class="container py-xl-4 py-lg-2">
            <!-- tittle heading -->
            <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                <span>O</span>ur
                <span>P</span>roducts</h3>
            <!-- //tittle heading -->
            <div class="row">
                <!-- product left -->
                <div class="agileinfo-ads-display col-lg-9">
                    <div class="wrapper">
                        <!-- first section -->
                        <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                            <h3 class="heading-tittle text-center font-italic">Products</h3>
                            <div class="row">
                                @foreach ($products as $product)
                                    <div class="col-md-4 product-men mt-5">
                                        <div class="men-pro-item simpleCart_shelfItem">
                                            <div class="men-thumb-item text-center">
                                                <img src="{{ $product->picture }}" alt="" height="201" width="194">
                                            </div>
                                            <div class="item-info-product text-center border-top mt-4">
                                                <h4 class="pt-1">
                                                    {{ $product->name }}
                                                    <p>
                                                        {{ $product->description }}
                                                    </p>
                                                </h4>
                                                <div class="info-product-price my-2">
                                                    <span class="item_price">{{ $product->price }}€</span>
                                                </div>
                                                @if (Auth::check())
                                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                                    <form action="#" method="post">
                                                        <fieldset>
                                                            <input type="hidden" name="cmd" value="_cart" />
                                                            <input type="hidden" name="add" value="{{ $product->id }}" />
                                                            <input type="hidden" name="business" value=" " />
                                                            <input type="hidden" name="item_name" value="{{ $product->name }}" />
                                                            <input type="hidden" name="amount" value="{{ $product->price }}" />
                                                            <input type="hidden" name="currency_code" value="EUR" />
                                                            <input type="submit" name="submit" value="Add to cart" class="button btn" />
                                                        </fieldset>
                                                    </form>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- //first section -->
                    </div>
                </div>
                <!-- //product left -->

                <!-- product right -->
                <div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
                    <div class="side-bar p-sm-4 p-3">
                        <form action="{{route('search')}}" method="get">
                            <div class="search-hotel border-bottom py-2">
                                <h3 class="agileits-sear-head mb-3">Search Here..</h3>
                                    <input type="search" placeholder="Product name..." name="name" required>
                                    <input type="submit" value=" ">
                            </div>
                            <!-- types -->
                            @include('layouts.frontoffice.types.types')
                            <!-- //types -->
                                <!-- brands -->
                            @include('layouts.frontoffice.brands.brands')
                            <!-- //brands -->
                        </form>
                    </div>
                    <!-- //product right -->
                </div>
            </div>
        </div>
    </div>
    <!-- //top products -->


    <!-- footer -->
    <footer>
        <div class="footer-top-first">
            <div class="container py-md-5 py-sm-4 py-3">
                <!-- footer second section -->
                <div class="row w3l-grids-footer border-top border-bottom py-sm-4 py-3">
                    <div class="col-md-4 offer-footer">
                        <div class="row">
                            <div class="col-4 icon-fot">
                                <i class="fas fa-dolly"></i>
                            </div>
                            <div class="col-8 text-form-footer">
                                <h3>Free Shipping</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 offer-footer my-md-0 my-4">
                        <div class="row">
                            <div class="col-4 icon-fot">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                            <div class="col-8 text-form-footer">
                                <h3>Fast Delivery</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 offer-footer">
                        <div class="row">
                            <div class="col-4 icon-fot">
                                <i class="far fa-thumbs-up"></i>
                            </div>
                            <div class="col-8 text-form-footer">
                                <h3>Big Choice</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //footer second section -->
            </div>
        </div>
        <!-- footer third section -->
        <div class="w3l-middlefooter-sec">
            <div class="container py-md-5 py-sm-4 py-3">
                <div class="row footer-info w3-agileits-info">
                    <!-- quick links -->
                    <div class="col-md-3 col-sm-6 footer-grids mt-sm-0 mt-4">
                        <h3 class="text-white font-weight-bold mb-3">Quick Links</h3>
                        <ul>
                            <li class="mb-3">
                                <a href="{{ route('about') }}">About Us</a>
                            </li>
                            <li class="mb-3">
                                <a href="{{ route('contact') }}">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 footer-grids mt-md-0 mt-4">
                        <h3 class="text-white font-weight-bold mb-3">Get in Touch</h3>
                        <ul>
                            <li class="mb-3">
                                <i class="fas fa-map-marker"></i>
                                <a href="https://maps.google.com/maps?q=Universidade Fernando Pessoa">Universidade Fernando Pessoa</a></li>
                            <li class="mb-3">
                                <i class="fas fa-mobile"></i>
                                <a href="tel:00351222466010"> 222 466 010 </a>
                            </li>

                            <li class="mb-3">
                                <i class="fas fa-envelope-open"></i>
                                <a href="mailto:28051@ufp.edu.pt">28051@ufp.edu.pt</a>
                            </li>
                            <li>
                                <i class="fas fa-envelope-open"></i>
                                <a href="mailto:33814@ufp.edu.pt">33814@ufp.edu.pt</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 footer-grids w3l-agileits mt-md-0 mt-4">
                        <!-- social icons -->
                        <div class="footer-grids  w3l-socialmk mt-3">
                            <h3 class="text-white font-weight-bold mb-3">Follow Us on</h3>
                            <div class="social">
                                <ul>
                                    <li>
                                        <a class="icon fb" href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="icon tw" href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="icon gp" href="#">
                                            <i class="fab fa-google-plus-g"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- //social icons -->
                    </div>
                </div>
                <!-- //quick links -->
            </div>
        </div>
        <!-- //footer third section -->
    </footer>
    <!-- //footer -->
@endsection
