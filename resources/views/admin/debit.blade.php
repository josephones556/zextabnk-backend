@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Debit Bank Account</div>

                <div class="card-body">

                                    <table class="table plain">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p class="">Username</p>
                                                    <p class="">Account Name</p>
                                                    <p class="">Balance</p>
                                                </td>
                                                <td>
                                                    <p class="text-right">{{ $user->username }}</p>
                                                    <p class="text-right">{{ $user->account->firstname }} {{ $user->account->lastname }} </p>
                                                    <p class="text-right">$ {{ number_format($user->account->balance, 2) }}</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
                                            <a class="btn btn-primary" href="{{ route('admin.account', ['id' => $user->id]) }}">Back To Account</a>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <form method="POST" action="{{ route('admin.account.action', ['action' => 'debit', 'id' => $user->id]) }}">
                                                @csrf
                                                <style type="text/css">
                                                    .invalid-feedback {
                                                        display: unset;
                                                        margin-top: .25rem;
                                                        font-size: .875rem;
                                                        color: #dc3545;
                                                    }
                                                </style>
                                                <div class="form-row">

                                                    <div class="form-group col-md-6">
                                                        <label for="Amount" class="col-form-label">Amount <sup>(USD)</sup></label>
                                                        <input type="number" class="form-control" id="Amount" placeholder="Amount In USD" name="amount"  value="{{ old('amount') }}" required>
                                                        @if ($errors->has('amount'))
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $errors->first('amount') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="Date" class="col-form-label">Date Of Transaction</label>
                                                        <input type="date" class="form-control" id="Date" placeholder="Date Of Transaction" name="date"  value="{{ old('date') }}" required>
                                                        @if ($errors->has('date'))
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $errors->first('date') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="Country" class="col-form-label">Country</label>
                                                        <input type="text" class="form-control" placeholder="Country" id="Country" name="country" value="{{ old('country') }}" required>
                                                        @if ($errors->has('country'))
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $errors->first('country') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="Action" class="col-form-label">Action</label>
                                                        <select id="Action" name="action" class="form-control" required>
                                                            <option disabled>
                                                                Approved Or Disapproved
                                                            </option>
                                                            <option value="Approved">
                                                                Approved
                                                            </option value="Disapproved">
                                                            <option>
                                                                Disapproved
                                                            </option>
                                                        </select>
                                                        @if ($errors->has('action'))
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $errors->first('action') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="Debit" class="col-form-label">Should Debit <small>: Decrement Balance?</small></label>
                                                        <select id="Debit" name="debit" class="form-control" required>
                                                            <option disabled>
                                                                Yes Or No
                                                            </option value="no">
                                                            <option value="yes">
                                                                Yes
                                                            </option value="no">
                                                            <option>
                                                                No
                                                            </option>
                                                        </select>
                                                        @if ($errors->has('debit'))
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $errors->first('debit') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="alert alert-danger">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button><strong>Note: </strong> Kindly Review The Information Provided Above
                                                </div>
                                                <button type="submit" class="btn btn-primary">Debit Account</button>
                                            </form>
                                        </div>
                                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
