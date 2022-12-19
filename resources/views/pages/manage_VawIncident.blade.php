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
                                        <td><button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#viewVAW2"">View</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>

            <div class="modal fade" id="viewVAW2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                        <h3 class="modal-title position-absolute top-30 start-50 translate-middle" id="staticBackdropLabel">Victim Health Status Record</h3>
                    </div>
                    <div class="modal-body">
                        <div class="container border-secondary" style="height:400px; margin-top:0%; margin-bottom:0%;">
                            <div class="row mb-3 row1">
                                <div class="col-md-2 mx-5">
                                    <img src="ball.jpg" alt="Ball" class="profile">
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <h5 class="col-md-4">User ID: </h5>
                                        <h5 id="userID" class="col-md-1">sample</h5>
                                    </div>
                                    <div class="row mt-1">
                                        <h5 class="col-md-4">Victim:</h5>
                                        <h5 id="victim" class="col-md-1">sample</h5>
                                    </div>
                                    <div class="row mt-1">
                                        <h5 class="col-md-4">Address:</h5>
                                        <h5 id="address" class="col-md-1">sample</h5>
                                    </div>
                                    <div class="row mt-1">
                                        <h5 class="col-md-4">Location Link:</h5>
                                        <h5 id="loclink" class="col-md-1">sample</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <h5 class="col-md-2">Monitoring: </h5>
                            </div>
                            <div class="form-group mt-2">
                                <table class="table table-hover table-bordered text-center ">
                                    <thead class="bill-header cs">
                                        <tr>
                                            <th id="trs-hd-1" class="col-lg-2">Date Created</th>
                                            <th id="trs-hd-2" class="col-lg-1">Title</th>
                                            <th id="trs-hd-3" class="col-lg-2">Physical Health</th>
                                            <th id="trs-hd-4" class="col-lg-2">Mental Health</th>
                                            <th id="trs-hd-5" class="col-lg-2">Last Modified</th>
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
                                            <td><button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#viewVAW3">View</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="viewVAW3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-dismiss="modal">Back</button>
                        <h3 class="modal-title position-absolute top-30 start-50 translate-middle" id="staticBackdropLabel">View Days Monitoring Report</h3>
                    </div>
                    <div class="modal-body">
                        <div class="container border-secondary" style="height:400px; margin-top:0%; margin-bottom:0%;">
                            <div class="row mb-3 row1">
                                <div class="col-md-2 mx-5">
                                    <img src="ball.jpg" alt="Ball" class="profile">
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <h5 class="col-md-4">User ID: </h5>
                                        <h5 id="userID" class="col-md-1">sample</h5>
                                    </div>
                                    <div class="row mt-1">
                                        <h5 class="col-md-4">Victim:</h5>
                                        <h5 id="victim" class="col-md-1">sample</h5>
                                    </div>
                                    <div class="row mt-1">
                                        <h5 class="col-md-4">Address:</h5>
                                        <h5 id="address" class="col-md-1">sample</h5>
                                    </div>
                                    <div class="row mt-1">
                                        <h5 class="col-md-4">Location Link:</h5>
                                        <h5 id="loclink" class="col-md-1">sample</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <h5 class="col-md-2">Monitoring: </h5>
                            </div>
                            <div class="form-group mt-2">
                                <table class="table table-hover table-bordered text-center ">
                                    <thead class="bill-header cs">
                                        <tr>
                                            <th id="trs-hd-1" class="col-lg-2">Date Created</th>
                                            <th id="trs-hd-2" class="col-lg-1">Title</th>
                                            <th id="trs-hd-3" class="col-lg-2">Physical Health</th>
                                            <th id="trs-hd-4" class="col-lg-2">Mental Health</th>
                                            <th id="trs-hd-5" class="col-lg-2">Last Modified</th>
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
                                            <td><button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#viewVAW3">View</button></td>
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
</div>

@stop

<!-- Scripts -->
@section('scripts')

@stop
