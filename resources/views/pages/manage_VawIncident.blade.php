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
.button {
    text-align: center;
    margin-top: 1%;
}
</style>

@stop

<!-- Content -->
@section('content')

    <div class="container search" style="overflow: hidden; overflow-y: scroll;">
        <div class="row">
            <div class="col-md-5">
                <input class= "container-fluid h-100" type="text" placeholder="Search">
            </div>
        </div>
        <div class="form-group mt-3">
            <table class="table table-hover table-bordered text-center">
                <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd-1" class="col-lg-3">Barangay Name</th>
                        <th id="trs-hd-2" class="col-lg-3">Address</th>
                        <th id="trs-hd-3" class="col-lg-2"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="justify-contents-center ">
                        <td>Sample</td>
                        <td>Sample</td>
                        <td><button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#viewVAW1">View</button></td>
                    </tr>
                </tbody>
            </table>

            <div class="modal fade" id="viewVAW1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                            <h3 class="modal-title position-absolute top-30 start-50 translate-middle" id="staticBackdropLabel">View Barangay VAW Desk Report</h3>
                        </div>
                        <div class="modal-body">
                            <div class="container border-secondary" style="height:400px; margin-top:0%; margin-bottom:0%;">
                            <div class="button"><button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Sort By</button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                </ul>
                            </div>

                            <div class="form-group mt-5">
                                <table class="table table-hover table-bordered text-center">
                                    <thead class="bill-header cs">
                                        <tr>
                                            <th id="trs-hd-1" class="col-lg-1">User ID</th>
                                            <th id="trs-hd-2" class="col-lg-2">Name</th>
                                            <th id="trs-hd-3" class="col-lg-2">Address</th>
                                            <th id="trs-hd-4" class="col-lg-2">Email</th>
                                            <th id="trs-hd-5" class="col-lg-2">Contact No.</th>
                                            <th id="trs-hd-6" class="col-lg-3">Monitoring Status</th>
                                            <th id="trs-hd-7" class="col-lg-2"></th>
                                        </tr>
                                </thead>
                                <tbody>
                                    <tr class="justify-contents-center ">
                                        <td>01</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td><a role="button" class="btn btn-warning"  href="manage_VawIncidentB">View</a></td>
                                    </tr>
                                </tbody>
                            </table>
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
