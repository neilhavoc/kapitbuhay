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
<div class="container-fluid" style="overflow-y: scroll; overflow-x: hidden; height:700px;">
    <div class="position-relative" style="text-align:center">
        <h1 class=""> Manage Account</h1>
    </div>

    <div class="row mb-5 row1 ">
        <div class="col-md-7" style="text-align:center">
            <img src="{{ $account['policeLogo'] }}" alt="Ball" class="profile">
        </div>
        <div class="row mt-2">
            <h5 class="col-md-2">User ID: </h5>
            <h5 id="userID" class="col-md-4">{{ $account->id() }}</h5>
        </div>
        <div class="row mt-2">
            <h5 class="col-md-2">Police Station:</h5>
            <input type="text" disabled ="true" class="col-md-4" value="{{ $account['policeName'] }}">
        </div>
        <div class="row mt-2">
            <h5 class="col-md-2">Contact No:</h5>
            <input type="text" disabled ="true" class="col-md-4" value="{{ $account['policeContactNum1'] }}">
        </div>
        <div class="row mt-2">
            <h5 class="col-md-2">Address:</h5>
            <input type="text" disabled ="true" class="col-md-4" value="{{ $account['policePurok'] }}/{{ $account['policeStreet'] }}, {{ $account['policecity'] }} {{ $account['policeProvince'] }}">
        </div>
        <div class="row mt-2">
            <h5 class="col-md-2">Email:</h5>
            <input type="text" disabled ="true" class="col-md-4" value="{{ $account['policeEmail'] }}">
        </div>
        <div class="row mt-2">
            <h5 class="col-md-2">Password:</h5>
            <input type="password" class="col-md-4">
        </div>
        <div class="row mt-2 mb-3">
            <h5 class="col-md-2">Confirm Password:</h5>
            <input type="password" class="col-md-4">
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
