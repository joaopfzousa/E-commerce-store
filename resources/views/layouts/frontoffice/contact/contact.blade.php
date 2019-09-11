@extends('layouts.frontoffice')

@section('content')
    <div class="contact py-sm-5 py-4">
        <div class="container py-xl-4 py-lg-2">
            <!-- tittle heading -->
            <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                <span>C</span>ontact
                <span>U</span>s
            </h3>
            <!-- //tittle heading -->
            <div class="row contact-grids agile-1 mb-5">
                <div class="col-sm-4 contact-grid agileinfo-6 mt-sm-0 mt-2">
                    <div class="contact-grid1 text-center">
                        <div class="con-ic">
                            <i class="fas fa-map-marker-alt rounded-circle"></i>
                        </div>
                        <h4 class="font-weight-bold mt-sm-4 mt-3 mb-3">Address</h4>
                        <p>
                            <a href="https://maps.google.com/maps?q=Universidade Fernando Pessoa">Universidade Fernando Pessoa</a>
                        </p>
                    </div>
                </div>
                <div class="col-sm-4 contact-grid agileinfo-6 my-sm-0 my-4">
                    <div class="contact-grid1 text-center">
                        <div class="con-ic">
                            <i class="fas fa-phone rounded-circle"></i>
                        </div>
                        <h4 class="font-weight-bold mt-sm-4 mt-3 mb-3">Call Us</h4>
                        <p>
                            <a href="tel:00351222466010">222 466 010</a>
                        </p>
                    </div>
                </div>
                <div class="col-sm-4 contact-grid agileinfo-6">
                    <div class="contact-grid1 text-center">
                        <div class="con-ic">
                            <i class="fas fa-envelope-open rounded-circle"></i>
                        </div>
                        <h4 class="font-weight-bold mt-sm-4 mt-3 mb-3">Email</h4>
                        <p>
                            <a href="mailto:28051@ufp.edu.pt">28051@ufp.edu.pt</a>
                            <label>
                                <a href="mailto:33814@ufp.edu.pt">33814@ufp.edu.pt</a>
                            </label>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection