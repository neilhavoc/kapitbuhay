@extends('layouts.Police')

<!-- Page Title -->
@section('title', 'Title')

<!-- Styles -->
@section('styles')
<style>

</style>
@stop

<!-- Content -->
@section('content')
<div class="container-fluid" style="overflow-y: scroll; overflow-x: hidden; height:560px;">
    <div>
        <h1>
            Create Incident Report
        </h1>
    </div>
    <div class="container border-secondary" style="height:400px; margin-top:0%; margin-bottom:0%;">
    <div class="row mx-3 mt-4" >
        <div class="row ">
            <div class="col-md-4 fw-bold " >Reference ID:&nbsp;<label>sample</label></div>
            <div class="col-md-3 fw-bold ">Date:&nbsp;<label>sample</label></div>
            <div class="col-md-2 fw-bold ">Time:&nbsp;<label>sample</label></div>
        </div>
        <div class="row mt-1">
            <div class="col-md-4 fw-bold ">From:&nbsp;<label>sample</label></div>
            <div class="col-md-3 fw-bold ">Location Link:&nbsp;<label>sample</label></div>
        </div>
        <div class="row mt-1">
            <div class="col-md-4 fw-bold ">Specific Location:&nbsp;<label>sample</label></div>
            <div class="col-md-3 fw-bold ">Status:&nbsp;<label>sample</label></div>
        </div>
        <div class="row mt-3">
            <div class="row">
                <div class="col-md-3 fw-bold ">Message: </div>
            </div>
           <div class="row">
                <div class="col-md-6">  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled="disabled"></textarea></div>
           </div>
        </div>
    </div>
    <div class="row mt-5">
    <div class="col-md-8 fw-bold"> Report Details: <textarea class="form-control" id="exampleFormControlTextarea2" rows="3" disabled="disabled"></textarea></div>
    <div class="col-md-4">
        <div class="row">
            <div class="row">
                <div class="fw-bold ">Time/Date Created:</div>
            </div>
            <div class="row">
                <label>sample</label>
            </div>
            <div class="row">
                <div class="fw-bold ">Report Created By:</div>
            </div>
            <div class="row">
            <input type="text" disabled ="true" class="col-md-8" value="">
            </div>
            <div class="row">
                <div class="fw-bold ">Position:</div>
            </div>
            <div class="row">
            <input type="text" disabled ="true" class="col-md-8" value="">
            </div>
        </div>
    </div>
    </div>
</div>
<div class="row mt-3 mx-5 mb-5 justify-content-between">
                    <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                            Verify
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                            Not Verified
                            </label>
                            </div>
                        </div>
<div class="footer">
            <button type="submit" class="btn btn-primary"> Save </button>
        </div>

        <div class="col-auto">
                        <span id="reportNotif" class="form-text">
                        (Verified incidents will Automatically Notify Complaint Assigned Barangay VAW desk for the After Incident Monitoring)
                        </span>
                    </div>
        
</div>

@stop

<!-- Scripts -->
@section('scripts')

@stop
