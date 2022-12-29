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
@if ($account == null)
@else
            @foreach ($account as $item)
                            <div class="row mb-5 row1">
                                <div class="col-md-2 mt-1">
                                    <img src="{{ $item['policeLogo'] }}" alt="Ball" class="profile">
                                </div>

                                    <div class="row mt-2">
                                        <h5 class="col-md-2">User ID: </h5>
                                        <h5 id="userID" class="col-md-4">{{ $item->id() }}</h5>
                                    </div>
                                    <div class="row mt-2">
                                        <h5 class="col-md-2">Police Station:</h5>
                                        <input type="text" disabled ="true" class="col-md-4" value="{{ $item['policeName'] }}">
                                    </div>
                                    <div class="row mt-2">
                                        <h5 class="col-md-2">Contact No:</h5>
                                        <input type="text" disabled ="true" class="col-md-4" value="{{ $item['policeContactNum1'] }}">
                                    </div>
                                    <div class="row mt-2">
                                        <h5 class="col-md-2">Address:</h5>
                                        <input type="text" disabled ="true" class="col-md-4" value="{{ $item['policePurok'] }}/{{ $item['policeStreet'] }}, {{ $item['policecity'] }} {{ $item['policeProvince'] }}">
                                    </div>
                                    <div class="row mt-2">
                                        <h5 class="col-md-2">Email:</h5>
                                        <input type="text" disabled ="true" class="col-md-4" value="{{ $item['policeEmail'] }}">
                                    </div>
                                    <div class="row mt-2 mb-3">
                                        <h5 class="col-md-2">Password:</h5>
                                        <input type="password" class="col-md-5">
                                    </div>
                                    <div class="row mt-2 mb-3">
                                        <h5 class="col-md-2">Confirm Password:</h5>
                                        <input type="password" class="col-md-5">
                                    </div>

                            <div class="footer">
                            <button type="button" class="btn btn-primary">Save</button>
                            </div>
                            </div>
            @endforeach
@endif
@stop

<!-- Scripts -->
@section('scripts')

@stop
