@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if (session('message'))
                    <div class="alert alert-success">
                        {!! session('message') !!}
                    </div>
                @endif


                <div class="card">
                    <div class="card-header">{{ __('Add Bank') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.bank.create') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Bank Name') }}</label>

                                <div class="col-md-6">
                                    <input id="bankname" type="text" class="form-control{{ $errors->has('bankname') ? ' is-invalid' : '' }}" name="bankname" value="{{ old('bankname') }}">

                                    @if ($errors->has('bankname'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('bankname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Routing Number/Swift Code ') }}</label>

                                <div class="col-md-6">
                                    <input id="swiftcode" type="text" class="form-control{{ $errors->has('swiftcode') ? ' is-invalid' : '' }}" name="swiftcode" value="{{ $swiftcode }}" readonly>

                                    @if ($errors->has('swiftcode'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('swiftcode') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                                <div class="col-md-6">
                                    <input id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}">

                                    @if ($errors->has('country'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                       Create Bank
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
