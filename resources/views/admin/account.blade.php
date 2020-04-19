@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Account Details</div>

                <div class="card-body">

                                    <table class="table plain">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p class="">Username</p>
                                                    <p class="">Account Name</p>
                                                    <p class="">Account Number</p>
                                                    <p class="">Balance</p>
                                                </td>
                                                <td>
                                                    <p class="text-right">{{ $user->username }}</p>
                                                    <p class="text-right">{{ $user->account->firstname }} {{ $user->account->lastname }} </p>
                                                    <p class="text-right">{{ $user->account->account_number }}</p>
                                                    <p class="text-right">$ {{ number_format($user->account->balance, 2) }}</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">   

                                                        @if($user->isA('login-disabled'))
                                                            <div class="alert alert-danger">
                                                                Login to this account has been disabled!
                                                            </div>
                                                        @endif

                                                        @if($user->isA('blocked'))
                                                            <div class="alert alert-danger">
                                                                Transfers from this account has been blocked!
                                                            </div>
                                                        @endif
                                            
                                                        <a href="{{ route('admin.credit', [$user->id]) }}" class="btn btn-primary mr-2 mb-2">Credit Account </a>
                                                        <a href="{{ route('admin.debit', [$user->id]) }}" class="btn btn-primary mr-2 mb-2">Debit Credit Card </a>

                                                        @if($user->isA('blocked'))
                                                            <form action="{{ route('admin.account.action', [$user->id, 'unblock']) }}" style="display: inline-block;" method="POST">
                                                                @csrf
                                                                <button class="btn mb-2 btn-danger">Unblock Account</button>
                                                            </form>
                                                        @endif

                                                        @if($user->isA('login-disabled'))
                                                            <form action="{{ route('admin.account.action', [$user->id, 'enable-login']) }}" style="display: inline-block;" method="POST">
                                                                @csrf
                                                                <button class="btn mb-2 btn-danger">Enable Login</button>
                                                            </form>
                                                        @endif

                                                        <form action="{{ route('admin.account.action', [$user->id, 'terminate']) }}" style="display: inline-block;" method="POST">
                                                            @csrf
                                                            <button class="btn mb-2 btn-danger">Delete Account</button>
                                                        </form>

                                                        <form action="{{ route('admin.account.action', [$user->id, 'general']) }}" method="POST">
                                                            @csrf
                                                            <div class="form-group">
                                                                <select class="form-control" name="account_action">
                                                                    <option>-- Select Action --</option>
                                                                    <option value="disable-login"> Disable Login To Account </option>
                                                                    <option value="block"> Block Account From Transfer </option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <textarea class="form-control" name="block_message">Your Account Has Been Temporarily Disabled Due To Suspicious Fraudulent Activities, Kindly Visit {{ config('app.name') }} To Rectify This Issue. </textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-success btn-block"> Submit </button>
                                                            </div>
                                                        </form>

                                                        {{-- <form action="{{ route('admin.account.action', ['action' => 'limit', 'id' => $user->id]) }}" style="display: inline-block;" method="POST">
                                                            @csrf
                                                            <button class="btn mb-2 {{ $user->isA('limited') ? 'btn-danger' : 'btn-success' }}">Montly Limit</button> 
                                                        </form>
                                                        <form action="{{ route('admin.account.action', ['action' => 'block', 'id' => $user->id]) }}" style="display: inline-block;" method="POST">
                                                            @csrf
                                                            <button class="btn mb-2 {{ $user->isA('blocked') ? 'btn-danger' : 'btn-success' }}">Block Account</button>
                                                        </form>
                                                        
                                                        <form action="{{ route('admin.account.action', ['action' => 'ban', 'id' => $user->id]) }}" style="display: inline-block;" method="POST">
                                                            @csrf
                                                            <button class="btn mb-2 {{ $user->isA('banned') ? 'btn-danger' : 'btn-success' }}">Ban Account</button>
                                                        </form> --}}

                                                
                                        </div>
                                    </div>
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Reference</th>
                                                <th>Name</th>
                                                <th>Amount ($)</th>
                                                <th>Bank Name</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($user->account->transactions as $transaction)
                                                <tr>
                                                    <td class="{{ $transaction->type == 'Debit' ? 'text-danger' : 'text-success' }}">{{ $transaction->type }}</td>
                                                    <td>{{ $transaction->reference }}</td>
                                                    <td>{{ $transaction->account_name }}</td>
                                                    <td>{{ number_format($transaction->amount, 2) }} </td>
                                                    <td>{{ $transaction->bank_name }}</td>
                                                    <td>{{ $transaction->date->format('d M, Y') }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.alter.transaction', [$transaction->id]) }}">
                                                            Edit
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $user->account->transactions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
