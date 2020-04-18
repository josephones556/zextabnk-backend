@extends('layouts.app')

@section('title') Online Banking @endsection


@section('content')
            
            <style type="text/css">
                .inner-banner {
                    margin-bottom: 50px;
                }

                @media (max-width: 991px) {
                    .inner-banner .overlay {
                        padding: 20px 0 150px 0;
                    }                
                    .inner-banner {
                        margin-bottom: 30px;
                    }
                }

                .inner-banner .overlay {
                    background: rgba(250,250,250,0.92);
                    padding: 20px 0 150px 0;
                }

                .login-form input{
                    width: 100%;
                    height: 55px;
                    border: 1px solid rgba(0,0,0,0.08);
                    padding: 0 15px;
                    margin-bottom: 20px;
                    border-radius: 0px;
                }

                .login-form .submit{
                    width: 180px;
                    display: block;
                    margin: 0 auto;
                    background: #1455a6;
                }

                .login-form .submit{
                    display: block;
                    width: 100%;
                    height: 55px;
                    border: none;
                    color: #fff;
                    text-transform: uppercase;
                    font-family: 'Poppins', sans-serif;
                    font-size: 14px;
                    letter-spacing: 1.2px;
                }
            </style>

            
            <!-- 
            =============================================
                Theme Inner Banner
            ============================================== 
            -->
            <div class="inner-banner">
                <div class="overlay">
                    <div class="container">
                    </div> <!-- /.container -->
                </div> <!-- /.overlay -->
            </div> <!-- /.inner-banner -->

            
            
            <!-- 
            =============================================
                About us 
            ============================================== 
            -->
            <div class="about-us-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-12">
                            <h2 class="title">We’re here to <br>give you a<br> <strong>quick, secure</strong> and <strong>easy online banking</strong> experience</h2>
                        </div> <!-- /.col- -->
                        <div class="col-lg-7 col-12">
                            <div class="text-wrapper">
                                <h4>Secure Login</h4>
                                <h5>Enter Your Online Banking Information Below</h5>

                                <form method="POST" action="{{ route('login') }}" class="login-form row">
                                    @csrf
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="username" class="">{{ __('Username') }}</label>
                                            <input id="username" type="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                            @if ($errors->has('username'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="password" class="">{{ __('Password') }}</label>
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group mb-0">
                                            <div class="">
                                                <button type="submit" class="submit">
                                                    {{ __('Login') }}
                                                </button>
                                            </div>
                                        </div>                             
                                    </div>
                                </form>
                            </div> <!-- /.text-wrapper -->
                        </div> <!-- /.col- -->
                    </div> <!-- /.row -->
                    <div class="row image-gallery wow fadeInUp">
                        <div class="col-md-8 col-12"><img src="/front/images/home/4.jpg" alt=""></div>
                        <div class="col-md-4 col-12">
                            <img src="/front/images/home/5.jpg" alt="">
                            <img src="/front/images/home/6.jpg" alt="">
                        </div>
                    </div> <!-- /.image-gallery -->
                </div> <!-- /.container -->
            </div> <!-- /.about-us-section -->

@endsection
