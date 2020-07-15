@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Change Securify Pin/Password</div>

                <div class="card-body">

                                    <table class="table plain">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p class="">Username</p>
                                                    <p class="">Account Name</p>
                                                </td>
                                                <td>
                                                    <p class="text-right">{{ $user->username }}</p>
                                                    <p class="text-right">{{ $user->account->firstname }} {{ $user->account->lastname }} </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
                                            <a class="btn btn-primary" href="{{ route('admin.account', ['id' => $user->id]) }}">Back To Account</a>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            @if(session('success'))
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    {{ session('success') }}
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            @endif

                                            <form method="POST" action="{{ route('admin.change.security.action', ['id' => $user->id]) }}">
                                                @csrf
                                                <style type="text/css">
                                                    .invalid-feedback {
                                                        display: unset;
                                                        margin-top: .25rem;
                                                        font-size: .875rem;
                                                        color: #dc3545;
                                                    }
                                                </style>
                                                
                                                <input type="hidden" name="used_id" value="{{ $user->id }}">

                                                <div class="form-row">
                                                    <div class="form-group col-sm-12">
                                                        <label for="Credit" class="col-form-label">Security Type</label>
                                                        <select id="security_type" name="security_type" class="form-control" required>
                                                            <option value="">
                                                                -- Select Security Type --
                                                            </option value="no">
                                                            <option value="pin">
                                                                Change Pin (TAC)
                                                            </option value="password">
                                                            <option>
                                                                Change Password
                                                            </option>
                                                        </select>
                                                        @if ($errors->has('security_type'))
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $errors->first('security_type') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group col-sm-12">
                                                        <label for="new_security" class="col-form-label">New Security</label>
                                                        <input type="text" class="form-control" placeholder="New Security" id="New Security" name="new_security" value="{{ old('new_security') }}" required>
                                                        @error('new_security')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group col-sm-12">
                                                        <label for="new_security_confirmation" class="col-form-label">New Security Confirmation</label>
                                                        <input type="text" class="form-control" placeholder="New Security Confirmation" id="new_security_confirmation" name="new_security_confirmation" value="{{ old('new_security_confirmation') }}" required>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Change Security</button>
                                            </form>
                                        </div>
                                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
