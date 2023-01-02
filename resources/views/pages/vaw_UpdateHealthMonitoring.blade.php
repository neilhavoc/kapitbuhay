@extends('layouts.Vaw')

<!-- Page Title -->
@section('title', 'Vaw Review Distress')

<!-- Styles -->
@section('styles')
<style>
    .profile{
    height: 170x;
    width: 200px;
}
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
<div class="container-fluid" style="overflow-y: scroll; overflow-x: hidden; height:600px;">
    <div style="text-align:center">
        <h1>
            Victims Health Status Monitoring
        </h1>
    </div>
    <div class="row mx-3" style="height: 100vh;">
        <div class="row mb-3">
            <div class="col-md-2 mx-5">
                <img src="#" alt="Ball" class="profile">


            </div>
            <div class="col-md-8">
                <div class="row">
                    <h5 class="col-md-2">User ID: </h5>
                    <h5 id="userID" class="col-md-4"></h5>
                </div>
                <div class="row mt-1">
                    <h5 class="col-md-4">Victim Name:</h5>
                    <input type="text" disabled ="true" class="col-md-4" value="">
                </div>
                <div class="row mt-1">
                    <h5 class="col-md-4">Address:</h5>
                    <input type="text" disabled ="true" class="col-md-4" value="">
                </div>
                <div class="row mt-1">
                    <h5 class="col-md-4">Location Link:</h5>
                    <input type="text" disabled ="true" class="col-md-4" value="">
                </div>
                <div class="row mt-1">
                    <h5 class="col-md-4">Phone Number:</h5>
                    <input type="text" disabled ="true" class="col-md-4" value="">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="form-group mt-0">
                <table class="table table-hover table-bordered text-center">
                    <thead class="bill-header cs">
                        <tr>
                            <th id="trs-hd-1" class="col-lg-1">Date Created</th>
                            <th id="trs-hd-2" class="col-lg-2">Title</th>
                            <th id="trs-hd-3" class="col-lg-2">Physical Health</th>
                            <th id="trs-hd-4" class="col-lg-2">Mental Health</th>
                            <th id="trs-hd-5" class="col-lg-3">Last Modified </th>
                            <th id="trs-hd-6" class="col-lg-3">Monitoring Status</th>
                            <th id="trs-hd-7" class="col-lg-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="justify-contents-center ">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Edit
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <button class="btn btn-danger">
                    Create New Record
                </button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-success">
                    Send Notification
                </button>
            </div>
        </div>
    </div>
</div>
@stop

<!-- Scripts -->
@section('scripts')
@stop
