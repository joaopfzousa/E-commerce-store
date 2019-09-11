@extends('layouts.backoffice')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Clients') }}</div>
                    <div class="card-body">
                            <ul>
                                @foreach ($clients as $client)
                                    <li>{{ $client->id }} - {{ $client->name }}</li>
                                    <a class="btn btn-primary" href="{{ route('edit-client',$client->id) }}">Edit</a>
                                @endforeach
                            </ul>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <a href="{{ route('new-client') }}" class="btn btn-primary">
                                        {{ __('Register Client') }}
                                    </a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
