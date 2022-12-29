@extends('layouts.Police')

<!-- Page Title -->
@section('title', 'Title')

<!-- Styles -->
@section('styles')
<style>
.modal-footer-text-center {
    text-align: center;
    margin-bottom: 1%;
}    
.footer{
    text-align: center;
    margin-bottom: 1%;
}
</style>
@stop

<!-- Content -->
@section('content')
<div class="container-fluid" style="overflow-y: scroll; overflow-x: hidden; height:560px;">
    <div>
        <h1>
            Review Distress Message
        </h1>
    </div>
    <div class="container border-secondary" style="height:400px; margin-top:0%; margin-bottom:0%;">
    <div class="row mx-3" style="height: 100vh;">
                <div class="col-md-6">
                    <div class="row mt-5">
                        <div class="col-md-4 fw-bold " >Reference ID:&nbsp;<label>sample</label></div>
                        <div class="col-md-4 fw-bold ">Date:&nbsp;<label>sample</label></div>
                        <div class="col-md-4 fw-bold ">Time:&nbsp;<label>sample</label></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-5 fw-bold ">From:&nbsp;<label>sample</label></div>
                        <div class="col-md-5 fw-bold ">User ID:&nbsp;<label>sample</label></div>
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
                        <div class="col-md-4">
                        <button type="button" class="btn btn-danger float-md-end" data-bs-toggle="modal" data-bs-target="#reportUser">Report User</button>
                        </div>
                    </div>

                
                    <div class="row mt-5 mx-5 justify-content-evenly">
                        <div class="col-md-5">
                            <a role="button" class="btn btn-success"  href="police_createReports">Create Report</a>
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-warning">Cancel</button>
                        </div>
                    </div>

                    <div class="footer mt-4">
            <button type="submit" class="btn btn-primary"> Save </button>
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

            <div class="modal fade" id="reportUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">X</button>
        <!-- <h3 class="modal-title position-absolute top-30 start-50 translate-middle" id="staticBackdropLabel">Report User</h3> -->
      </div>
      <div class="modal-body">
        <h3 class="text-center">Report User</h3>
      <div class="row mt-3 mx-5 mb-5 justify-content-between">
                    <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                            Violation 1
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                            Violation 1
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                            Violation 1
                            </label>
                            </div>
                            <div class="row mt-3">
                        <div class="row">
                            <div class="col-md-3 fw-bold ">Additional: </div>
                        </div>
                       <div class="row">
                            <div class="col-md-12">  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled="disabled"></textarea></div>
                       </div>
                    </div>
                         
                        </div>

</div>
<div class="modal-footer-text-center">
            <button type="submit" class="btn btn-primary"> Save </button>
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
