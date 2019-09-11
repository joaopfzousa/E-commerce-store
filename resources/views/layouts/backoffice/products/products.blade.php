@extends('layouts.backoffice')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Products') }}</div>
                    <div class="card-body">
                            <ul>
                                @foreach ($products as $product)
                                    <li>{{ $product->id }} - {{ $product->name }}</li>
                                    <form action="{{ route('destroy-product',$product->id) }}" method="POST">

                                       <a class="btn btn-primary" href="{{ route('edit-product',$product->id) }}">Edit</a>

                                        @method('DELETE')
                                        @csrf

                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                @endforeach
                            </ul>



                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <a href="{{ route('new-product') }}" class="btn btn-primary">
                                        {{ __('Register Product') }}
                                    </a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
