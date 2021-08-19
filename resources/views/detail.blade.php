@extends('app')
@section('content')
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Product Details</h1>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-7 mb-3">
                            <div class="card shadow mb-4">
                                <div class="card-body text-dark">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <img src="{{$product['gallery']}}" height="300">
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-group float-right">
                                                <a href="/" class="btn btn-secondary btn-sm">Back</a>
                                            </div>
                                            <div class="form-group mt-5 ml-3">
                                                <h4>Name: {{$product['name']}}</h4>
                                                <h5>Price: &#8377; {{$product['price']}}</h5>
                                                <h5>Category: {{$product['category']}}</h5>
                                                <h5>Description: {{$product['description']}}</h5>
                                                <div class="form-group text-center mt-4">
                                                    <form action="/add_to_cart" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{$product['id']}}">
                                                        <button type="submit" class="btn btn-danger">Add To Cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endSection