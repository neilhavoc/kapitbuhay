@extends('layouts.Vaw')

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
<div class="container search">
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
                <button class="btn btn-primary h-100" type="button">List of Distress Message</button>
            </div>
        </div>
        <div class="form-group mt-0">
            <table class="table table-hover table-bordered text-center">
                <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd-1" class="col-lg-1">REF ID</th>
                        <th id="trs-hd-2" class="col-lg-2">From</th>
                        <th id="trs-hd-3" class="col-lg-2">Address</th>
                        <th id="trs-hd-4" class="col-lg-2">Contact No.</th>
                        <th id="trs-hd-5" class="col-lg-3">Distress Message</th>
                        <th id="trs-hd-6" class="col-lg-3">Status</th>
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
                                View
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
</div>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
          <h3 class="modal-title position-absolute top-25 start-50 translate-middle" id="staticBackdropLabel">Review Distress Message</h3>
        </div>
        <div class="modal-body">
            <div class="row mx-3" style="height: 100vh;">
                <div class="col-md-6">
                    <div class="row mt-5">
                        <div class="col-md-4 fw-bold " >Reference ID:&nbsp;<label>sample</label></div>
                        <div class="col-md-4 fw-bold ">Date:&nbsp;<label>sample</label></div>
                        <div class="col-md-4 fw-bold ">Time:&nbsp;<label>sample</label></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6 fw-bold ">From:&nbsp;<label>sample</label></div>
                        <div class="col-md-6 fw-bold ">Location Link:&nbsp;<label>sample</label></div>
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
                    <div class="row mt-3 mx-5 mb-5">
                        <div class="col-md-8">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                  Verify
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                <label class="form-check-label" for="flexCheckChecked">
                                  Unverified
                                </label>
                              </div>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger">Report</button>
                        </div>
                    </div>
                    <div class="row mt-5 mx-5 justify-contents-center">
                        <div class="col-md-6">
                            <a role="button" class="btn btn-success"  href="vaw_createReports">Create Report</a>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-warning">Transfer to Police</button>
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
