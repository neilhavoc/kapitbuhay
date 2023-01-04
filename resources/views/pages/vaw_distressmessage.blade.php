@extends('layouts.Vaw')

<!-- Page Title -->
@section('title', 'VAW Distress')

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
        <div class="form-group mt-0" style="overflow: hidden; overflow-y: scroll;">
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
                    @if ($message == null)
                        <tr class="justify-contents-center ">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @else
                        @foreach ($message as $item)
                            @if($item['receiving_Brgy'] == session('barangay'))
                                <tr class="justify-contents-center ">
                                    <td>{{ $item->id() }}</td>
                                    <td>{{ $item['sender_FullName'] }}</td>
                                    <td>{{ $item['sender_barangay'] }}, {{ $item['sender_city'] }}</td>
                                    <td>{{ $item['sender_phoneNo'] }}</td>
                                    <td>{{ $item['distressMessage'] }}</td>
                                    <td>{{ $item['status'] }}</td>
                                    <td>
                                            <form action="vaw_distressmessage" method="POST">
                                                @csrf
                                                <input type="text" hidden="true" name="distressID" class="col-md-3" value="{{ $item->id() }}">
                                                <button type="submit" class="btn btn-success"> View </button>
                                            </form>
                                    </td>
                                </tr>
                            @else
                            @endif
                        @endforeach
                    @endif
                </tbody>
            </table>
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
