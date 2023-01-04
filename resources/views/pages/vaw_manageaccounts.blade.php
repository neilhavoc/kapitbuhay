@extends('layouts.Vaw')

<!-- Page Title -->
@section('title', 'Title')

<!-- Styles -->
@section('styles')
<style>
    .profile{
    height: 170x;
    width: 200px;

}
.footer{
    margin-left: 380px;
}
</style>
@stop

<!-- Content -->
@section('content')
<div class="container-fluid" style="overflow-y: scroll; overflow-x: hidden; height:560px;">
    <div class="position-relative" style="text-align:center">
      <h1 class=""> Manage Account</h1>
    </div>
    <div class="row mb-5 row1 " style="margin-top:5%">
        <div class="col-md-7" style="text-align:center">
            <img src="{{ $account['brgyLogo'] }}" alt="Ball" class="profile">
        </div>
        <div class="row mt-2">
            <h5 class="col-md-2">User ID: </h5>
            <h5 id="userID" class="col-md-4">{{ $account->id() }}</h5>
        </div>
        <div class="row mt-2">
            <h5 class="col-md-2">Name:</h5>
            <input type="text" class="col-md-5" value="{{ $account['brgyName'] }}" disabled>
        </div>
        <div class="row mt-2">
            <h5 class="col-md-2">Contact No:</h5>
            <input type="text" class="col-md-5" value="{{ $account['brgyContactNum1'] }}" disabled>
        </div>
        <div class="row mt-2">
            <h5 class="col-md-2">Street:</h5>
            <input type="text" class="col-md-5" value="{{ $account['brgyStreet'] }}" disabled>
        </div>
        <div class="row mt-2">
            <h5 class="col-md-2">Brgy & City:</h5>
            <input type="text" class="col-md-5" value="{{ $account['barangay'] }}, {{ $account['brgycity'] }}" disabled>
        </div>
        <div class="row mt-2">
            <h5 class="col-md-2">Email:</h5>
            <input type="text" class="col-md-5" value="{{ $account['brgyEmail'] }}" disabled>
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
