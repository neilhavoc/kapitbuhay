@extends('layouts.manage_accounts')

<!-- Page Title -->
@section('title', 'Title')

<!-- Styles -->
@section('styles')
<style>

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
                        <th id="trs-hd-1" class="col-lg-1">ID</th>
                        <th id="trs-hd-2" class="col-lg-3">Victim Name</th>
                        <th id="trs-hd-3" class="col-lg-3">Address</th>
                        <th id="trs-hd-4" class="col-lg-3">Email</th>
                        <th id="trs-hd-4" class="col-lg-2">Contact</th>
                        <th id="trs-hd-4" class="col-lg-2"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="justify-contents-center ">
                        <td>01</td>
                        <td>Sample</td>
                        <td>Sample</td>
                        <td>Sample</td>
                        <td>Sample</td>
                        <td><button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#viewVictim">View</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="viewVictim" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                        <h5 class="modal-title position-absolute top-25 start-50 translate-middle" id="staticBackdropLabel">View Police Profile</h5>
                    </div>
                    <div class="modal-body">
                        <div class="container border-secondary" style="height:400px; margin-top:0%; margin-bottom:0%;">
                            <div class="row mt-5 no-gutter">
                                <div class="col-md-2 mb-2 fw-bold">ID:</div>
                                <div class="col-md-4 "><input  id="vic_id" type="text" class="form-control align-content-center w-100"  placeholder="" disabled="disabled" ></div>
                            </div>
                            <div class="row mt-3 no-gutter">
                                <div class="col-md-2 fw-bold">Victim Name:</div>
                                <div class="col-md-4"> <input  id="vic_name" type="text" class="form-control align-content-center w-100"  placeholder="" disabled="disabled" ></div>
                            </div>
                            <div class="row mt-3 no-gutter">
                                <div class="col-md-2 fw-bold">Address: </div>
                                <div class="col-md-4"> <input  id="vic_address" type="text" class="form-control align-content-center w-100"  placeholder="" disabled="disabled" ></div>
                            </div>
                            <div class="row mt-3 no-gutter">
                                <div class="col-md-2 fw-bold">Email: </div>
                                <div class="col-md-4"> <input  id="vic_email" type="text" class="form-control align-content-center w-100"  placeholder="" disabled="disabled" ></div>
                            </div>
                            <div class="row mt-3 no-gutter">
                                <div class="col-md-2 fw-bold">Contact: </div>
                                <div class="col-md-4"> <input  id="vic_contact" type="text" class="form-control align-content-center w-100"  placeholder="" disabled="disabled" ></div>
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
