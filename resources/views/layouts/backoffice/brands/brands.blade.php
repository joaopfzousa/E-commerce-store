@extends('layouts.backoffice')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Brands') }}</div>
                    <div class="card-body">
                        <ul>
                            @foreach ($brands as $brand)
                                <li>{{ $brand->id }} - {{ $brand->name }}</li>
                                <form action="{{ route('destroy-brand',$brand->id) }}" method="POST">

                                    <a class="btn btn-primary" href="{{ route('edit-brand',$brand->id) }}">Edit</a>

                                    @method('DELETE')
                                    @csrf

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            @endforeach
                        </ul>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('new-brand') }}" class="btn btn-primary">
                                    {{ __('Register brand') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection