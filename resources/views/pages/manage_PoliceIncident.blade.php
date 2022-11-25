@extends('layouts.manage_incidentreport')

<!-- Page Title -->
@section('title', 'Title')

<!-- Styles -->
@section('styles')
<style>
.profile{
    height: 170x;
    width: 200px;
}
.credential{
    height: 170x;
    width: 200px;
}
.head-credential{
    font-size: 12px;
}
.modal-footer-text-center{
    text-align: center;
    padding-bottom: 50px;
}
</style>

@stop

<!-- Content -->
@section('content')

    <div class="container search">
        <div class="row">
            <div class="col-md-5">
                <input class= "container-fluid h-100" type="text" placeholder="Search">
            </div>
        </div>
        <div class="form-group mt-3">
            <table class="table table-hover table-bordered text-center">
                <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd-1" class="col-lg-1">REC ID</th>
                        <th id="trs-hd-2" class="col-lg-3">Police Station Name</th>
                        <th id="trs-hd-3" class="col-lg-3">Date/Time</th>
                        <th id="trs-hd-4" class="col-lg-3">User Invovle</th>
                        <th id="trs-hd-4" class="col-lg-2"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="justify-contents-center ">
                        <td>01</td>
                        <td>Sample</td>
                        <td>Sample</td>
                        <td>Sample</td>
                        <td><button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#viewPolice">View</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="viewPolice" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
        <h3 class="modal-title position-absolute top-30 start-50 translate-middle" id="staticBackdropLabel">View Incident Report</h3>
      </div>
      <div class="modal-body">

<div class="container border-secondary" style="height:400px; margin-top:0%; margin-bottom:0%;">
    <div class="row">
        <div class="col-md-4 mb-2 fw-bold">
           Report ID:
        </div>
    </div>
    <div class="row ">
        <div class="col-md-4 "><input  id="Fname" type="text" class="form-control align-content-center w-100"  placeholder="" disabled="disabled" ></div>
    </div>
    <div class="row mt-2">
       <div class="col-md-8 fw-bold">Created By:</div>
    </div>
    <div class="row mt-2 ">
        <div class="col-md-3"> <input  id="DoB" type="text" class="form-control align-content-center w-100"  placeholder="" disabled="disabled" ></div>
    </div>
    <div class="row mt-2">
       <div class="col-md-8 fw-bold">Date Created: </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4"> <input  id="DoB" type="text" class="form-control align-content-center w-100"  placeholder="" disabled="disabled" ></div>
    </div>
    <div class="row mt-2">
       <div class="col-md-8 fw-bold">User Involve: </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4"> <input  id="DoB" type="text" class="form-control align-content-center w-100"  placeholder="" disabled="disabled" ></div>
    </div>
    <div class="row mt-5">
    <div class="col-mb-3">  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled="disabled"></textarea></div>
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
