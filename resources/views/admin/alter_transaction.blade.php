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
                <div class="card-header">{{ __('Alter Transaction') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.update.transaction', [$transaction->id]) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="type">
                                    <option value="{{ $transaction->type }}"> {{ $transaction->type }} </option>
                                    <option value="{{ $transaction->type == "Credit" ? "Debit" : "Credit" }}"> {{ $transaction->type == "Credit" ? "Debit" : "Credit" }} </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Amount" class="col-md-4 col-form-label text-md-right">{{ __('Amount') }}</label>
                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control" value="{{ $transaction->amount }}" name="amount" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bank_name" class="col-md-4 col-form-label text-md-right">{{ __('Bank Name') }}</label>
                            <div class="col-md-6">
                                <input id="bank_name" type="text" class="form-control" value="{{ $transaction->bank_name }}" name="bank_name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="account_number" class="col-md-4 col-form-label text-md-right">{{ __('Account Number') }}</label>
                            <div class="col-md-6">
                                <input id="account_number" type="text" class="form-control" value="{{ $transaction->account_number }}" name="account_number" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="account_name" class="col-md-4 col-form-label text-md-right">{{ __('Account Name') }}</label>
                            <div class="col-md-6">
                                <input id="account_name" type="text" class="form-control" value="{{ $transaction->account_name }}" name="account_name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="swift_code" class="col-md-4 col-form-label text-md-right">{{ __('Swift/Routing Number') }}</label>
                            <div class="col-md-6">
                                <input id="swift_code" type="text" class="form-control" value="{{ $transaction->swift_code }}" name="swift_code" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('country') }}</label>
                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control" value="{{ $transaction->country }}" name="country" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Date" class="col-md-4 col-form-label text-md-right">Date Of Transaction</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" id="Date" placeholder="Date Of Transaction" name="date"  value="{{ $transaction->date->format('Y-m-d') }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Transaction') }}
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
