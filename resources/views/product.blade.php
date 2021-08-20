@extends('app')
@section('content')
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Products</h1>
                        <a href="/add-product" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm text-uppercase"><i
                                class="fas fa-plus mr-1"></i>Add Product</a>
                    </div>

                    <div class="row">
                        @foreach ($products as $item)
                        <div class="col-lg-2 mb-3">
                            <div class="card shadow mb-4">
                                <img class="card-img-top" src="{{ $item['gallery'] }}" alt="Card image" height="250" >
                                <div class="bg-primary"><h5 class="m-2 text-white">{{$item['name']}}</h5></div>
                                <div class="card-body text-dark">
                                    <h6 class="text-center"><strong>&#8377; </strong><strong>{{$item['price']}}</strong></h6>
                                    <div class="text-center">
                                        <a href="/detail/{{$item['id']}}" class="btn btn-primary btn-sm">More Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
@endSection