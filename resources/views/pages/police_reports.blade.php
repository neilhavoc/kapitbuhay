@extends('layouts.Police')

<!-- Page Title -->
@section('title', 'Title')

<!-- Styles -->
@section('styles')
<style>
    .search {
    margin-top: 100px;
 }
 .bill-header.cs {
  background-color: rgba(37,71,106,0.56);
  color: #fff;
}
</style>

@stop

<!-- Content -->
@section('content')
<div class="container search" style="overflow: hidden; overflow-y: scroll;">
<div class="row g-1 mb-5">
            <div class="col-md-5">
                <input class= "container-fluid h-100" type="text" placeholder="Search">
            </div>
            <div class="col-md-6">
	<button type="button" class="btn btn-primary">Search</button>
</div>
    </div>
    <div class="col-md-6 mb-2">
  <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Sort By</button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="#">Separated link</a></li>
  </ul>
</div>
    

    <div class="row">
    <div class="col-md-6  mb-0">
            <button class="btn btn-primary h-100" type="button">Recent</button>
            <button class="btn btn-primary h-100" type="button">List of Incident Reports</button>
        </div>
    </div>
    <div class="form-group mt-0">
    <table class="table table-hover table-bordered text-center">
                <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd-1" class="col-lg-1">REF ID</th>
                        <th id="trs-hd-2" class="col-lg-3">Record Date/Time</th>
                        <th id="trs-hd-3" class="col-lg-3">Created By</th>
                        <th id="trs-hd-4" class="col-lg-2"></th>
                    </tr>
                </thead>
                <tbody>
                <tr class="justify-contents-center ">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#viewReport">
                                        View
                                    </button>
                                </td>
                            </tr>
                </tbody>
    </div>

    <div class="modal fade" id="viewReport" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
        <h3 class="modal-title position-absolute top-30 start-50 translate-middle" id="staticBackdropLabel">Viewing Incident Report</h3>
      </div>
      <div class="modal-body">

<div class="container border-secondary" style="height:400px; margin-top:0%; margin-bottom:0%;">
    <div class="row mt-5">
        <div class="col-md-6 fw-bold " >Reference ID:&nbsp;<label>sample</label></div>
        <div class="col-md-3 fw-bold ">Date:&nbsp;<label>sample</label></div>
        <div class="col-md-2 fw-bold ">Time:&nbsp;<label>sample</label></div>       
    </div>
    <div class="row mt-2">
       <div class="col-md-6 fw-bold ">From:&nbsp;<label>sample</label></div>
       <div class="col-md-2 fw-bold ">Location Link:&nbsp;<label>sample</label></div>
    </div>
    <div class="row mt-3">
       <div class="col-md-6 fw-bold ">Specific Location:&nbsp;<label>sample</label></div>
       <div class="col-md-2 fw-bold ">Status:&nbsp;<label>sample</label></div>
    </div>
    <div class="row mt-5">
        <div class="row">
            <div class="col-md-3 fw-bold ">Message: </div>
        </div>
       <div class="row">
            <div class="col-md-12">  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled="disabled"></textarea></div>
       </div>
    </div>
    <div class="row mt-5">
    <div class="col-md-10 fw-bold"> Report Details: <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled="disabled"></textarea></div>
    <div class="col-md-2">
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
                <label>sample</label>
            </div>
            <div class="row">
                <div class="fw-bold ">Position:</div>
            </div>
            <div class="row">
                <label>sample</label>
            </div>
        </div>
    </div>
    </div>
</div>
</div>
    </div>
  </div>
        </div>
    
@stop

<!-- Scripts -->
@section('scripts')

@stop
