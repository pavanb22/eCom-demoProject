<?php
    use App\Models\User;
    use Carbon\Carbon;

    $user = User::find(Session::get('user')['id']);
?>
@extends('app')
@section('content')
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">All Notifications</h1>
                    </div>
                   
                    <div class="row justify-content-center">
                        <div class="col-lg-6 mb-3">
                            <div class="card shadow mb-4">
                                <div class="card-body text-dark">
                                    <div class="col-md-12">
                                        @foreach ($user->unreadNotifications as $notification)
                                            <a class="dropdown-item d-flex align-items-center" href="/view-user/{{$notification->data['id']}}/{{$notification->id}}">
                                                <div class="mr-3">
                                                    <div class="icon-circle bg-warning">
                                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="small text-gray-500">{{ Carbon::now()->format($notification->created_at) }}</div>
                                                    <span class="font-weight-bold">{{$notification->data['data']}}</span>
                                                </div>
                                            </a>
                                            <hr>
                                        @endforeach
                                        @foreach ($user->readNotifications as $notification)
                                            <a class="dropdown-item d-flex align-items-center" href="/view-user/{{$notification->data['id']}}/{{$notification->id}}">
                                                <div class="mr-3">
                                                    <div class="icon-circle bg-warning">
                                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="small text-gray-500">{{ Carbon::now()->format($notification->created_at) }}</div>
                                                    {{$notification->data['data']}}
                                                </div>
                                            </a>
                                            <hr>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endSection