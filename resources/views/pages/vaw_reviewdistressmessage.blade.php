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
                <button type="button" class="btn btn-danger">Report this User</button>
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
                            <div class="col-md-6">
                                <select class="form-select" name="disMesStatus" aria-label="Default select example">
                                    <option selected value="Unread">Unread</option>
                                    <option value="Read">Help is on the Way</option>
                                    <option value="Transferred">Transfer to Police</option>
                                    <option value="Completed">Completed</option>
                                </select>
                            </div>
                            <div class="col-md-auto">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                    <form action="vaw_reviewdistressmessage/transferDistress/{{ $message['sosID'] }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mt-5 mx-5 justify-content-between">
                            <div class="col-md-6">
                                <select class="form-select" name="transferDistress" aria-label="Default select example">
                                    <option selected disabled>Select police station </option>
                                    @foreach ($police as $row)
                                        @if ($row['policeJurisdiction'] == session('barangay'))
                                            <option value="{{$row['policeUID']}}">{{$row['policeName']}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-auto">
                                <button type="submit" class="btn btn-warning">Transfer to police</button>
                            </div>
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
