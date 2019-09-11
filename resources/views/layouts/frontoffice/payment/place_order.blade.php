@extends('layouts.frontoffice')

@section('content')
    <!-- payment page-->
    <div class="privacy py-sm-5 py-4">
        <div class="container py-xl-4 py-lg-2">
            <!-- tittle heading -->
            <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                <span>P</span>ayment</h3>
            <!-- //tittle heading -->
            <div class="checkout-right">
                <!--Horizontal Tab-->
                <div id="parentHorizontalTab">
                    <div class="resp-tabs-container hor_1">
                        <div>
                                <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                                    <div class="credit-card-wrapper">
                                        <div class="first-row form-group">
                                            <div class="controls">
                                                <label class="control-label">Entity</label>
                                                <p>{{ $payment->entity }}</p>
                                            </div>
                                            <div class="w3_agileits_card_number_grids my-3">
                                                <div class="w3_agileits_card_number_grid_left">
                                                    <div class="controls">
                                                        <label class="control-label">Reference</label>
                                                        <p>{{ $payment->reference }}</p>
                                                    </div>
                                                </div>
                                                <div class="w3_agileits_card_number_grid_right mt-2">
                                                    <div class="controls">
                                                        <label class="control-label">Montante</label>
                                                        <p>{{ $payment->total_price }}</p>
                                                    </div>
                                                </div>
                                                <div class="clear"> </div>
                                            </div>
                                        </div>
                                        <a href="{{ route('home') }}" class="btn btn-default mt-3">Make Payment</a>
                                        <script type="application/javascript">
                                            localStorage.removeItem("PPminicarts");
                                        </script>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <!--Plug-in Initialisation-->
            </div>
        </div>
    </div>
    <!-- //payment page -->
@endsection