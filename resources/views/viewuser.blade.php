@extends('app')
@section('content')
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">User Search</h1>
                    </div>
                   
                    <div class="row justify-content-center">
                        <div class="col-lg-6 mb-3">
                            <div class="card shadow mb-4">
                                <div class="card-body text-dark">
                                    <div class="col-md-12">
                                        <div class="alert alert-success" role="alert">
                                            {{$user['name']}} view your profile..
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endSection