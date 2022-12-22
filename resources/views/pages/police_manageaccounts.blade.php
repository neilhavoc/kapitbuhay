@extends('layouts.Police')

<!-- Page Title -->
@section('title', 'Title')

<!-- Styles -->
@section('styles')
<style>
.profile{
    height: 170x;
    width: 200px;
    margin-top: 50px;
}
.footer{
    margin-left: 380px;
}
</style>

@stop

<!-- Content -->
@section('content')
<div class="container-fluid" style="overflow-y: scroll; overflow-x: hidden; height:560px;">
<div class="position-relative mb-3">
  <h1 class="position-absolute top-0 start-0"> Manage Account</h1>
</div>
                            <div class="row mb-5 row1">
                                <div class="col-md-2 mt-1">
                                    <img src="ball.jpg" alt="Ball" class="profile">
                                </div>

                                    <div class="row mt-2">
                                        <h5 class="col-md-2">User ID: </h5>
                                        <h5 id="userID" class="col-md-4">sample</h5>
                                    </div>
                                    <div class="row mt-2">
                                        <h5 class="col-md-2">Name:</h5>
                                        <input type="text" class="col-md-5">
                                    </div>
                                    <div class="row mt-2">
                                        <h5 class="col-md-2">Contact No:</h5>
                                        <input type="text" class="col-md-5">
                                    </div>
                                    <div class="row mt-2">
                                        <h5 class="col-md-2">Address:</h5>
                                        <div class="col-md-1 mt-2">
                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Region</button>
                                         <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                                        </ul>
                                        </div>
                                        &nbsp;
                                        &nbsp;
                                        &nbsp;
                                        <div class="col-md-1 mt-2">
                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Province</button>
                                         <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                                        </ul>
                                        </div>
                                        &nbsp;
                                        &nbsp;
                                        &nbsp;
                                        &nbsp;
                                        <div class="col-md-1 mt-2">
                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">City</button>
                                         <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                                        </ul>
                                        </div>
                                        &nbsp;
                                        &nbsp;
                                        <div class="col-md-1 mt-2">
                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Barangay</button>
                                         <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                                        </ul>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <h5 class="col-md-2">Street:</h5>
                                        <input type="text" class="col-md-5">
                                    </div>
                                    <div class="row mt-2">
                                        <h5 class="col-md-2">Email:</h5>
                                        <input type="text" class="col-md-5">
                                    </div>
                                    <div class="row mt-2">
                                        <h5 class="col-md-2">Username:</h5>
                                        <input type="text" class="col-md-5">
                                    </div>
                                    <div class="row mt-2 mb-3">
                                        <h5 class="col-md-2">Password:</h5>
                                        <input type="text" class="col-md-5">
                                    </div>

                            <div class="footer">
                            <button type="button" class="btn btn-primary">Save</button>
                            </div>
                            </div>
</div>
@stop

<!-- Scripts -->
@section('scripts')

@stop
