@extends('layouts.Vaw')

<!-- Page Title -->
@section('title', 'Title')

<!-- Styles -->
@section('styles')
@stop

<!-- Content -->
@section('content')
<div class="container-fluid" style="overflow-y: scroll; overflow-x: hidden; height:560px;">
    <h3 class="text-center">Review Distress Message</h3>
            <div class="row justify-content-end">
                <div class="col-md-auto">
                    <button type="button" class="btn btn-danger">Report this User</button>
                </div>
            </div>
            <div class="row mx-3" style="height: 100vh;">
                <div class="col-md-6">
                    <div class="row mt-5">
                        <div class="col-md-4 fw-bold " >Reference ID:&nbsp;<label>sample</label></div>
                        <div class="col-md-4 fw-bold ">Date:&nbsp;<label>sample</label></div>
                        <div class="col-md-4 fw-bold ">Time:&nbsp;<label>sample</label></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6 fw-bold ">From:&nbsp;<label>sample</label></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6 fw-bold ">Specific Location:&nbsp;<label>sample</label></div>
                    </div>
                    <div class="row mt-3">
                        <div class="row">
                            <div class="col-md-3 fw-bold ">Distress Message: </div>
                        </div>
                       <div class="row">
                            <div class="col-md-12">  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled="disabled"></textarea></div>
                       </div>
                    </div>
                    <div class="row mt-3 mx-5 mb-5 justify-content-between">
                        <div class="col-md-6">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Unread</option>
                                <option value="1">Help is on the Way</option>
                              </select>
                        </div>
                        <div class="col-md-auto">
                            <button type="button" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                    <div class="row mt-5 mx-5 justify-content-between">

                        <div class="col-md-6">
                            <select class="form-select" aria-label="Default select example">
                                <option selected disabled>Select police station </option>
                                <option value="1">police station 1</option>
                                <option value="2">police station 2</option>
                                <option value="3">police station 3</option>
                            </select>
                        </div>
                        <div class="col-md-auto">
                            <button type="button" class="btn btn-warning">Transfer to police</button>
                        </div>
                    </div>
                    <div class="row mt-5 mx-5 justify-content-center">
                        <div class="col-md-auto">
                            <a role="button" class="btn btn-success"  href="vaw_createReports">Create Incident Report</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="row mt-3 ">
                        <div class="col-md-6 fw-bold ">Location Link:</div>
                    </div>
                    <div class="row mt-3">
                        Sample
                    </div>
                    <div class="row mt-3 mx-3">
                        <div id="googleMap" style="width:100%;height:400px; " ></div>
                    </div>
                </div>
            </div>
</div>


@stop

<!-- Scripts -->
@section('scripts')
<script>
    function myMap() {
    var mapProp= {
      center:new google.maps.LatLng(51.508742,-0.120850),
      zoom:5,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnwBnZtVNK_pmkcdWB6BQeH9S9LQUlXew&callback=myMap"></script>
@stop
