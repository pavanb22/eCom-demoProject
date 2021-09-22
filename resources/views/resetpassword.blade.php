@extends('master')

@section('content')
<!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-reset-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                                    </div>
                                    <form action="/reset-password/{{$id}}" method="POST" class="user">
                                    	@csrf
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="New Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password_confirmation" name="password_confirmation" placeholder="Confirm New Password">
                                            <small class="text-danger">{{ $errors->first('password') }}</small>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-user col-md-6">Update Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
@endSection