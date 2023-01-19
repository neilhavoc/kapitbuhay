@extends('layouts.Vaw')

<!-- Page Title -->
@section('title', 'Vaw Review Distress')

<!-- Styles -->
@section('styles')
<style>
    #map {
        width:90%;
        height:400px;
    }

</style>
@stop

<!-- Content -->
@section('content')
<div class="container-fluid" style="overflow-y: scroll; overflow-x: hidden; height:560px;">
    <h3 class="text-center">Review Distress Message</h3>
        <div class="row justify-content-end">
            <div class="col-md-auto">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#reportUser">Report this User</button>
            </div>
        </div>
        <div class="row mx-3" style="height: 100vh;">
            <div class="col-md-6">
                <div class="col-md-4 fw-bold invisible" id="lat" >{{ $message['Latitude'] }}</div>
                <div class="col-md-4 fw-bold invisible" id="lng" >{{ $message['Longitude'] }}</div>

                <div class="row mt-5">
                    <div class="col-md-4 fw-bold " >Reference ID:&nbsp;<label>{{ $message['sosID'] }}</label></div>
                    <div class="col-md-6 fw-bold ">Date & Time:&nbsp;<label>{{ $message['sendDate'] }}</label></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6 fw-bold ">From:&nbsp;<label>{{ $message['sender_FullName'] }}</label></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-10 fw-bold ">Specific Location:&nbsp;<label>{{ $message['user_location'] }}</label></div>
                </div>
                    <div class="row mt-3">
                        <div class="row">
                            <div class="col-md-3 fw-bold ">Distress Message: </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled="disabled">
                                    {{ $message['distressMessage'] }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <form action="vaw_reviewdistressmessage/distressStatus/{{ $message['sosID'] }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mt-3 mx-5 mb-5 justify-content-between">
                            @if ($message['status'] == 'Unread' || $message['status'] == 'Read')
                                <div class="col-md-6">
                                    <select class="form-select" name="disMesStatus" aria-label="Default select example">
                                        <option selected value="Unread">Unread</option>
                                        <option value="Read">Help is on the Way</option>
                                        <option value="Transferred">Transfer to Police</option>
                                        <option value="Responded">Issue has been responded</option>
                                    </select>
                                </div>
                                <div class="col-md-auto">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            @else
                                <div class="col-md-6">
                                    <select class="form-select" name="disMesStatus" aria-label="Default select example" disabled>
                                    </select>
                                </div>
                                <div class="col-md-auto">
                                    <button type="submit" class="btn btn-primary" disabled>Save</button>
                                </div>
                            @endif
                        </div>
                    </form>
                    <div class="row mt-5 mx-5 justify-content-center">
                        <div class="col-md-auto">
                            <a href="vaw_createReports" class="btn btn-success {{$disable}}" role="button" aria-disabled="true">Create Incident Report</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="row mt-3 ">
                        <div class="col-md-6 fw-bold ">Location Link:</div>
                    </div>
                    <div class="row mt-3">
                        <a href="{{ $message['location_link'] }}">Google Maps</a>
                    </div>
                    <div class="row mt-3 mx-3">
                        <div id="map" ></div>
                    </div>
                </div>
            </div>
        </div>
</div>

<form action="vaw_reviewdistressmessage/reportAcc/{{ $message['sender_userID']}}" method="POST">
    @csrf
    @method('PUT')
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
                            @if ($victim['strike'] >= 1)
                                <input class="form-check-input" name="strike1" type="checkbox" value="1" id="flexCheckDefault" disabled>
                            @else
                                <input class="form-check-input" name="strike1" type="checkbox" value="1" id="flexCheckDefault">
                            @endif

                            <label class="form-check-label" for="flexCheckDefault">
                                Violation 1
                            </label>
                        </div>
                        <div class="form-check">
                            @if ($victim['strike'] >= 2)
                                <input class="form-check-input" name="strike2" type="checkbox" value="2" id="flexCheckDefault" disabled>
                            @else
                                <input class="form-check-input" name="strike2" type="checkbox" value="2" id="flexCheckDefault">
                            @endif
                            <label class="form-check-label" for="flexCheckDefault">
                                Violation 2
                            </label>
                        </div>
                        <div class="form-check">
                            @if ($victim['strike'] == 3)
                                <input class="form-check-input" name="strike3" type="checkbox" value="3" id="flexCheckDefault" disabled>
                            @else
                                <input class="form-check-input" name="strike3" type="checkbox" value="3" id="flexCheckDefault">
                            @endif
                            <label class="form-check-label" for="flexCheckDefault">
                                Violation 3
                            </label>
                        </div>
                        <div class="row mt-3">
                            <div class="row">
                                <div class="col-md-3 fw-bold ">Additional: </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled="disabled">{{$victim['strike']}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            @if ($victim['strike'] == 3)
                                <button type="submit" class="btn btn-danger disabled">Report</button>
                            @else
                                <button type="submit" class="btn btn-danger">Report</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@stop

<!-- Scripts -->
@section('scripts')
<script>
    const lat = document.getElementById('lat');
    const lng = document.getElementById('lng');
    var latitude = Number(lat.textContent);
    var longitute = Number(lng.textContent);
    console.log(longitute);
    console.log(latitude);

    let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: latitude, lng: longitute },
    zoom: 15,
  });
  new google.maps.Marker({
    position: { lat: latitude, lng: longitute},
    map: map,
  })
}

window.initMap = initMap;
</script>
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnwBnZtVNK_pmkcdWB6BQeH9S9LQUlXew&callback=initMap&v=weekly"
      defer
    ></script>
@stop
