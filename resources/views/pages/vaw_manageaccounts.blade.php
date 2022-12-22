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
</style>
@stop

<!-- Content -->
@section('content')
<div class="container-fluid" style="overflow-y: scroll; height:700px; overflow-x: hidden;">
    <div class="mb-5" style="margin-left:42%;">
        <h1>
            Manage Account
        </h1>
    </div>
    <div class="container" style="margin-left:30%;">
    <div class="row mx-3 mt-4">
        <div class="row mt-1">
            <div class="col-md-auto fw-bold " > <img src="ball.jpg" alt="Ball" class="profile"></div>
            <div class="col-md-3 fw-bold "><input class="form-control" type="file" ></div>
        </div>
        <div class="row mt-1">
            <div class="col-md-auto fw-bold h3">User ID:&nbsp;<label>sample</label></div>
        </div>
        <div class="row mt-1">
            <div class="col-md-auto fw-bold h3">Name:&nbsp;<label>sample</label></div>
        </div>
        <div class="row mt-1">
            <div class="col-md-auto fw-bold h3">Contact No:&nbsp;<label>sample</label></div>
        </div>
        <div class="row mt-1">
            <div class="col-md-auto fw-bold h3">Address:&nbsp;<label>sample</label></div>
        </div>
        <div class="row mt-1">
            <div class="col-md-auto fw-bold h3">Street:&nbsp;<label>sample</label></div>
        </div>
        <div class="row mt-1">
            <div class="col-md-auto fw-bold h3">Email:&nbsp;<label>sample</label></div>
        </div>
        <div class="row mt-1">
            <div class="col-md-auto fw-bold h3">Username:&nbsp;<input type="text" class="col-md-5"></div>
        </div>
        <div class="row mt-1">
            <div class="col-md-auto fw-bold h3">Password:&nbsp;<input type="text" class="col-md-5"></div>
        </div>
    </div>
    </div>
    <div class="footer" style="margin-left:42%;">
        <button class="btn btn-danger" >
            Save
        </button>
    </div>
</div>

@stop

<!-- Scripts -->
@section('scripts')

@stop
