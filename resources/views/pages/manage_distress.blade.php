@extends('layouts.index')

<!-- Page Title -->
@section('title', 'Distress Messages')

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
<div class="container mt-4">
    <h1>List of Distress Message</h1>
    <div class="form-group mt-5">
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
                    @if ($message == null)
                    <tr>
                        <td> - </td>
                        <td> - </td>
                        <td> - </td>
                        <td> - </td>
                        <td> - </td>
                    </tr>
                    @else
                        @foreach ($message as $item)
                        <tr class="justify-contents-center ">
                            <td>{{ $item->id() }}</td>
                            <td>{{ $item['sender_FullName'] }}</td>
                            <td>{{ $item['sendDate'] }}</td>
                            <td>Barangay VAW</td>
                            <td>{{ $item['status'] }}</td>
                            <td>
                                <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#viewDistress{{ $item->id() }}">
                                    View
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
</div>

@if ($message == null)
    @else
    @foreach ($message as $item)
    <div class="modal fade" id="viewDistress{{ $item->id() }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <form action="feedback/{{ $item->id() }}" method="GET">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                        <h3 class="modal-title position-absolute top-30 start-50 translate-middle" id="staticBackdropLabel">View Distress Message</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="container " style="margin-top:0%; margin-bottom:0%;">
                                    <div class="row mt-5">
                                        <div class="col-md-6 fw-bold " >Reference ID:&nbsp;<label>{{ $item->id() }}</label></div>
                                        <div class="col-md-6 fw-bold ">Date/Time:&nbsp;<label>{{ $item['sendDate'] }}</label></div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6 fw-bold ">From:&nbsp;<label>{{ $item['sender_FullName'] }}</label></div>
                                        <div class="col-md-6 fw-bold ">User ID:&nbsp;<label>{{ $item['sender_userID'] }}</label></div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6 fw-bold ">User Address:&nbsp;<label>{{ $item['sender_barangay'] }}, {{ $item['sender_city'] }}</label></div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="row">
                                            <div class="col-md-3 fw-bold ">Distress Message: </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled="disabled">{{ $item['distressMessage'] }}</textarea></div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6 fw-bold ">Distress Message Status:&nbsp;<label>{{ $item['status'] }}</label></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mt-3">
                                    <div class="col-md-6 fw-bold ">Location Link:</div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6 fw-bold "><a href="{{ $item['location_link'] }}">Google Maps</a></div>
                                </div>
                                <div class="row mt-3 ">
                                    <div id="googleMap" style="width:90%;height:400px; " ></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
@endif
@stop

<!-- Scripts -->
@section('scripts')
<script>
    //import { collection, query, where, getDocs } from "firebase/firestore";

    //const q = query(collection(db, "sos-distress-message"), where("status", "==", 'unread'));
    function myMap() {

        //$firestore = app('firebase.firestore');
        //$database = $firestore->database();
        //$userRef = $database->collection('sos-distress-message');
        //$civilianUsers = $userRef->documents();

        var mapProp= {
        center:new google.maps.LatLng(10.3155681,123.99116),
        zoom:5,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnwBnZtVNK_pmkcdWB6BQeH9S9LQUlXew&callback=myMap"></script>
@stop
