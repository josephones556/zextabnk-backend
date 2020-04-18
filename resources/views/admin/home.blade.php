@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Users & Accounts</div>

                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Account Name</th>
                                <th>Account Balance</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($accounts as $account)
                                <tr>
                                    <td class="">{{ $account->username }}</td>
                                    @if($account->account)
                                        <td>{{ $account->account->firstname }} {{ $account->account->lastname }} </td>
                                        <td>{{ $account->account->balance }}</td>                          
                                        <td><a href="{{ route('admin.account', ['id' => $account->id ])}}" class="text-primary">Details</a></td>     
                                    @else
                                        <td>Nil</td>
                                        <td>Nil</td> 
                                        <td>Pending</td>   
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $accounts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
