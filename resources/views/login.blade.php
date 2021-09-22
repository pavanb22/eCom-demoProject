
@extends('master')

@section('content')
<!-- Nested Row within Card Body -->
                        
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    @if(Session::has('success'))
                                    <div class="alert alert-success">{{Session('success')}}</div>
                                    @endif
                                    @if(Session('error'))
                                    <div class="alert alert-danger">{{Session('error')}}</div>
                                    @endif
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form action="login" method="POST" class="user">
                                    	@csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="user_email" name="user_email" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." value="{{ Cookie::get('login_email') ? Cookie::get('login_email') : '' }}">
                                            <small class="text-danger">{{ $errors->first('user_email') }}</small>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="user_password" name="user_password" placeholder="Password" value="{{ Cookie::get('login_password') ? Cookie::get('login_password') : '' }}">
                                            <small class="text-danger">{{ $errors->first('user_password') }}</small>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                @if(Cookie::get('login_email'))
                                                    <input type="checkbox" class="custom-control-input" id="remember_me" name="remember_me" checked>
                                                @else
                                                    <input type="checkbox" class="custom-control-input" id="remember_me" name="remember_me">
                                                @endif
                                                <label class="custom-control-label" for="remember_me">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                        <hr>
                                        <a href="/google" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="/facebook" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/forgot-password">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
@endSection