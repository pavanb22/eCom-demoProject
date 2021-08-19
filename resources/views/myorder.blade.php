@extends('app')
@section('content')
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Orders List</h1>
                    </div>
                    
                    <div class="row">
                        @if (count($orders)>0)
                            @foreach ($orders as $item)
                            <div class="col-lg-6 mb-3">
                                <div class="card shadow mb-4">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <img class="card-img-top" src="{{$item->gallery}}" alt="Card image" height="300" >
                                        </div>
                                        <div class="col-md-7">

                                           
                                            <div class="card-body text-dark">
                                                <div class="form-group"><h4 class="font-weight-bold">{{$item->name}}</h4></div>
                                                <h6>Price:  &#8377;{{$item->price}}</h6>
                                                <h6>Delivery Status: {{$item->status}}</h6>
                                                <h6>Payment Status: {{$item->payment_status}}</h6>
                                                <h6>Payment Method: {{$item->payment_method}}</h6>
                                                <h6>Address: {{$item->address}}</h6>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="col-lg-12">
                                <div class="alert alert-danger" role="alert">
                                    Orders Not available..!!
                                </div>
                            </div>
                        @endif
                    </div>
@endSection