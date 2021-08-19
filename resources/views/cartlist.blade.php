@extends('app')
@section('content')
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Cart Products</h1>
                    </div>
                    @if (count($products)>0)
                    <div class="row">
                        <div class="col-lg-2 mb-4">
                            <a href="/order" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>
                    @endif

                    <div class="row">
                        @if (count($products)>0)
                            @foreach ($products as $item)
                            <div class="col-lg-2 mb-3">
                                <div class="card shadow">
                                    <img class="card-img-top" src="{{$item->gallery}}" alt="Card image" height="250" >
                                    <div class="bg-primary"><h5 class="m-2 text-white">{{$item->name}}</h5></div>
                                    <div class="card-body text-dark">
                                        <h6 class="text-center"><strong>Price: &#8377; </strong><strong>{{$item->price}}</strong></h6>
                                        <div class="text-center">
                                            <a href="/remove/{{$item->card_id}}" class="btn btn-danger btn-sm">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="col-lg-12">
                                <div class="alert alert-danger" role="alert">
                                    Cart is empty..!!
                                </div>
                            </div>
                        @endif
                    </div>

                    @if (count($products)>0)
                    <div class="row">
                        <div class="col-lg-2 mb-4">
                            <a href="/order" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>
                    @endif
@endSection