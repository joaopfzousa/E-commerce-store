@extends('layouts.frontoffice')

@section('content')
    <div class="welcome py-sm-5 py-4">
        <div class="container py-xl-4 py-lg-2">
            <!-- tittle heading -->
            <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                <span>U</span>ser
                <span>D</span>etails</h3>
            <!-- //tittle heading -->
            <div class="row">
                <div class="modal-body">
                    <form method="post" action="{{ route('update-user-details') }}">
                        @csrf

                        <div class="form-group">
                            <label class="col-form-label">Name</label>
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ (old('name') ? old('name') : $user->name) }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Address</label>
                            <input id="adress" type="text" class="form-control{{ $errors->has('adress') ? ' is-invalid' : '' }}" name="adress" value="{{ (old('adress') ? old('adress') : ($client ? $client->adress : '')) }}" required>

                            @if ($errors->has('adress'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('adress') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Contribuinte</label>
                            <input id="vat_numeber" type="varchar" class="form-control{{ $errors->has('vat_numeber') ? ' is-invalid' : '' }}" name="vat_numeber" value="{{ (old('vat_numeber') ? old('vat_numeber') : ($client ? $client->vat_numeber : '')) }}" required>

                            @if ($errors->has('vat_numeber'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('vat_numeber') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Telefone</label>
                            <input id="phone_number" type="varchar" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ (old('phone_number') ? old('phone_number') : ($client ? $client->phone_number : '')) }}" required>

                            @if ($errors->has('phone_number'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="right-w3l">
                            <input type="submit" class="form-control" value="Update details">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
