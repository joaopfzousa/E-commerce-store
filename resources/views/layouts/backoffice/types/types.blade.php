@extends('layouts.backoffice')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Types') }}</div>
                    <div class="card-body">
                        <ul>
                            @foreach ($types as $type)
                                <li>{{ $type->id }} - {{ $type->name }}</li>
                                <form action="{{ route('destroy-type',$type->id) }}" method="POST">

                                    <a class="btn btn-primary" href="{{ route('edit-type',$type->id) }}">Edit</a>

                                    @method('DELETE')
                                    @csrf

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            @endforeach
                        </ul>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('new-type') }}" class="btn btn-primary">
                                    {{ __('Register type') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection