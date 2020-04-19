<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
        <meta name="robots" content="noindex,nofollow">
        {{-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> --}}

        <title>
            {{ config('app.name') }} — Login
        </title>

        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <style>
            body {
                background-color: #808080;
            }
        </style>
    </head>

    <body>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 pt-3">
                        <img src="/img/{{ config('app.name') }}/logo.png" height="50"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 pt-3 pb-5">
                        <div class="card">
                            <div class="card-body " style=" border: 1px solid #f58733;">
                                <div class="alert alert-secondary text-" role="alert" style="size: 6px">
                                    <small>
                                        Access to this system is restricted to authorized users only. Access is monitored and unauthorized users will be subject to prosecution and other legal action.
                                    </small>
                                </div>

                                <div class="card">
                                    <div class="card-header pb-0" style="background: #f58733;"> 
                                        <h5>Login to {{ config('app.name') }} Online Banking</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row" style="display: flex; align-items: center; justify-content: center;">
                                            
                                            <div style="width: 70%;">
                                            
                                                <form action="{{ route('login') }}" method="post">
                                                    @csrf

                                                    @if ($errors->any())
                                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                            @foreach ($errors->all() as $error)
                                                                {{ $error }}
                                                            @endforeach
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    @endif

                                                    @if(session('login-disabled'))
                                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                            {{ session('login-disabled') }}
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    @endif

                                                    <div class="my-auto p-3" style="display: flex; align-items: center; justify-content: center;">
                                                        @if($profile_picture)
                                                            <img src="{{ $profile_picture }}" height="70" width="70" style="border-radius: 50%"/>
                                                        @else
                                                            <img src="/img/login_flower.jpg" height="70" width="70" style="border-radius: 50%"/>
                                                        @endif
                                                    </div>
                                
                                                    <div class="form-group row">
                                                        <label for="staticEmail" class="col-sm-6 col-form-label text-right">Online Banking ID:</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="onlineBankingId" name="username" value="{{ $bankingId ? $bankingId : old('username') }}" placeholder="Online Banking ID">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputPassword" class="col-sm-6 col-form-label text-right">Password: </label>
                                                        <div class="col-sm-6">
                                                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                                                        </div>
                                                    </div>  

                                                    @if($question != "")
                                                        <div class="form-group row">
                                                            <label for="inputPassword" class="col-sm-6 col-form-label text-right">{{ $question }}</label>
                                                            <div class="col-sm-6">
                                                                <input type="text " name="security_question_answer" class="form-control" id="inputPassword" placeholder="Answer">
                                                            </div>
                                                        </div>
                                                    @endif

                                                    <div class="float-right">
                                                        <button class="btn btn-primary" type="submit" style="background: #f58733;">Submit form</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <span>
                                    <p class="text-center pt-3">
                                        Some internet browsers may save user names and passwords. This will automatically complete any login for you and may allow people at your computer to use your logins without knowing your passwords. For your security, please review your internet browser's "Help" section, or contact their Customer Support, to see if this option is available and how to turn it off.
                                    </p>
                                </span>

                                <div style="display: flex;  justify-content: flex-end;">
                                    <img src="/img/VeriSign.gif" height="50"/>
                                    <img src="/img/GovernmentLogo.jpeg" height="50"/>
                                    <img src="/img/GovernmentLogo.gif" height="50"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <script type="text/javascrip" src="/js/app.js"></script>
    </body>
</html>