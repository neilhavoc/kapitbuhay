@extends('layouts.index')

<!-- Page Title -->
@section('title', 'Title')

<!-- Styles -->
@section('styles')
<style>
.bill-header.cs {
  background-color: rgba(37,71,106,0.56);
  color: #fff;
}
</style>

@stop

<!-- Content -->
@section('content')
<div class="container">
    <h1>List of Distress Message</h1>
    <div class="form-group mt-3">
            <table class="table table-hover table-bordered text-center">
                <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd-1" class="col-lg-1">Log ID</th>
                        <th id="trs-hd-2" class="col-lg-3">From User</th>
                        <th id="trs-hd-3" class="col-lg-3">Date/Time</th>
                        <th id="trs-hd-4" class="col-lg-3">Sent To</th>
                        <th id="trs-hd-2" class="col-lg-3">Status</th>
                        <th id="trs-hd-6" class="col-lg-2"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="justify-contents-center ">
                        <td>Sample</td>
                        <td>Sample</td>
                        <td>Sample</td>
                        <td>Sample</td>
                        <td>Sample</td>
                        <td><button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#viewDistress">View</button></td>
                    </tr>
                </tbody>
            </table>
</div>
<div class="modal fade" id="viewDistress" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
        <h3 class="modal-title position-absolute top-30 start-50 translate-middle" id="staticBackdropLabel">View Distress Message</h3>
      </div>
      <div class="modal-body">

<div class="container border-secondary" style="height:400px; margin-top:0%; margin-bottom:0%;">
    <div class="row mt-5">
        <div class="col-md-6 fw-bold " >Reference ID:&nbsp;<label>sample</label></div>
        <div class="col-md-2 fw-bold ">Date/Time:&nbsp;<label>sample</label></div>
    </div>
    <div class="row mt-2">
       <div class="col-md-6 fw-bold ">From:&nbsp;<label>sample</label></div>
       <div class="col-md-2 fw-bold ">Location Link:&nbsp;<label>sample</label></div>
    </div>
    <div class="row mt-3">
       <div class="col-md-6 fw-bold ">Specific Location:&nbsp;<label>sample</label></div>
       <div class="col-md-2 fw-bold ">Report status:&nbsp;<label>sample</label></div>
    </div>
    <div class="row mt-5">
        <div class="row">
            <div class="col-md-3 fw-bold ">Distress Message: </div>
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
                <div class="fw-bold ">Police Station:</div>
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
</div>
@stop

<!-- Scripts -->
@section('scripts')

@stop
