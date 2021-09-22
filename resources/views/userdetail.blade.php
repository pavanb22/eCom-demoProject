@extends('app')
@section('content')
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">User Profile</h1>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-5 mb-3">
                            <div class="card shadow mb-4">
                                <div class="card-body text-dark">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSN88tG9LccWz7mnJyguy7Xtnz8u-Zm-HnLWg&usqp=CAU" height="200">
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-group float-right">
                                                <a href="/search" class="btn btn-secondary btn-sm">Back</a>
                                            </div>
                                            <div class="form-group mt-5 ml-3">
                                                <h4>Name: {{$user['name']}}</h4>
                                                <h5>Email: {{$user['email']}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endSection