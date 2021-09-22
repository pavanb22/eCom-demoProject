@extends('app')
@section('content')
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">User Search</h1>
                    </div>
                   
                    <div class="row justify-content-center">
                        <div class="col-lg-6 mb-3">
                            <div class="card shadow mb-4">
                                <div class="card-body text-dark">
                                    <form action="search" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <input type="text" name="search_user" id="search_user" class="form-control" placeholder="Type Here..">
                                                </div>
                                            </div> 
                                            <div class="col-md-3">
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary">Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    @if (!empty($users))
                                        @if (count($users)>0)
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table">
                                                        <tbody>
                                                        @foreach ($users as $user)
                                                            <tr>
                                                                <th scope="row" width="80%">{{$user['name']}}</th>
                                                                <td><a href="/user-detail/{{$user['id']}}" class="btn btn-warning btn-sm text-dark">View Profile</a></td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                    @if (!empty($result))
                                        <div class="col-md-12">
                                            <div class="alert alert-danger" role="alert">
                                                User not found...!!!
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
@endSection