@extends('master')

@section('content')
<!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-forgot-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        @if(Session::has('success'))
                                            <div class="alert alert-success">{{ Session::get('success') }}</p>
                                        @endif
                                        <h1 class="h4 text-gray-900 mb-4">Forgotten your password?</h1>
                                    </div>
                                    <form action="forgot-password" method="POST" class="user">
                                    	@csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="user_email" name="user_email" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." value="{{ old('user_email')}}">
                                            <small class="text-danger">{{ $errors->first('user_email') }}</small>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-user  col-md-6">Reset Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
@endSection