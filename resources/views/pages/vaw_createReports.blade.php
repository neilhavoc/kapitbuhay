@extends('layouts.Vaw')

<!-- Page Title -->
@section('title', 'Title')

<!-- Styles -->
@section('styles')
@stop

<!-- Content -->
@section('content')
<div class="container-fluid">
    <div>
        <h1>
            Create Report
        </h1>
    </div>
    <div class="row mx-3 mt-4" >
        <div class="row ">
            <div class="col-md-3 fw-bold " >Reference ID:&nbsp;<label>sample</label></div>
            <div class="col-md-2 fw-bold ">Date:&nbsp;<label>sample</label></div>
            <div class="col-md-2 fw-bold ">Time:&nbsp;<label>sample</label></div>
        </div>
        <div class="row mt-1">
            <div class="col-md-3 fw-bold ">From:&nbsp;<label>sample</label></div>
            <div class="col-md-3 fw-bold ">Location Link:&nbsp;<label>sample</label></div>
        </div>
        <div class="row mt-1">
            <div class="col-md-3 fw-bold ">Specific Location:&nbsp;<label>sample</label></div>
            <div class="col-md-3 fw-bold ">Status:&nbsp;<label>sample</label></div>
        </div>
        <div class="row mt-3">
            <div class="row">
                <div class="col-md-3 fw-bold ">Distress Message: </div>
            </div>
           <div class="row">
                <div class="col-md-6">  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled="disabled"></textarea></div>
           </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="row ">
            <div class="col-md-6 bg-warning">
dasdasd
            </div>
            <div class="col-md-6 bg-danger">
asdasd
            </div>
        </div>
    </div>
</div>

@stop

<!-- Scripts -->
@section('scripts')

@stop
