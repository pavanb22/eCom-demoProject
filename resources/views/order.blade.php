@extends('app')
@section('content')
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Order</h1>
        </div>
        <div class="row justify-content-center">
                        <div class="col-lg-6 mb-3">
                            <div class="card shadow mb-4">
                                <div class="card-body text-dark">
                                    <div class="row">
                                        <div class="col-lg-12 mb-3 ">
                                            <label for="bill" class="font-weight-bold">Bill</label>
                                            <table class="table">
                                              <tbody>
                                                <tr>
                                                  <th scope="row">Price</th>
                                                  <td>{{$total}} INR</td>
                                                </tr>
                                                <tr>
                                                  <th scope="row">Tax</th>
                                                  <td>0</td>
                                                </tr>
                                                <tr>
                                                  <th scope="row">Delivery Charges</th>
                                                  <td>100</td>
                                                </tr>
                                                <tr>
                                                  <th scope="row">Total Amount</th>
                                                  <td>{{$total+100}}</td>
                                                </tr>
                                              </tbody>
                                            </table>

                                            <form action="orderplace" method="POST">
                                                @csrf
                                              <div class="form-group">
                                                <label for="address" class="font-weight-bold">Delivery Address</label>
                                                <textarea name="address" class="form-control"> </textarea>
                                            </div>
                                              <div class="form-group">
                                                <label for="pay_method" class="font-weight-bold">Payment Method</label>
                                                <p>
                                                    <input type="radio" name="payment" value="online"><span class="m-1">Online Payment</span><br>
                                                    <input type="radio" name="payment" value="emi"><span class="m-1">EMI Payment</span><br>
                                                    <input type="radio" name="payment" value="cash"><span class="m-1">Cash On Payment</span><br>
                                                </p>
                                              </div>
                                              <div class="text-center">
                                                  <button type="submit" class="btn btn-primary">Order Now</button>
                                              </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                   
@endSection