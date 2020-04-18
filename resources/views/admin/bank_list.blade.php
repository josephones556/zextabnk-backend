@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">List Of Banks</div>

                    <div class="card-body">

                        @if(session('bank_created'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{ session('bank_created') }}.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

                                <a href="{{ route('admin.new_bank') }}" class="btn btn-primary mr-2 mb-2">Add New Bank  </a>
                            </div>
                        </div>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Bank Name</th>
                                <th>Bank Code</th>
                                <th>Country</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                ?>
                                @foreach($banks as $bank)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $bank->bank_name }}</td>
                                        <td>{{ $bank->bank_code }}</td>
                                        <td>{{ $bank->country }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            {{ $banks->links() }}
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
