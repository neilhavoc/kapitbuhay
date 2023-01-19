@extends('layouts.Vaw')

<!-- Page Title -->
@section('title', 'VAW Distress')

<!-- Styles -->
@section('styles')
<style>
    .search {
    margin-top: 1%;
 }
 .bill-header.cs {
  background-color: rgba(37,71,106,0.56);
  color: #fff;
}
</style>
@stop

<!-- Content -->
@section('content')
<div class="container search mb-2" style="overflow-y: scroll; overflow-x: hidden; height:560px;">
    <form action="vaw_distressmessage/displaySpecific" method="POST">
        @csrf
        <div class="row g-1 mb-5">
            <div class="col-md-2">
                <select class="form-select" name="sortby" id="sortby" aria-label="Sort By" required>
                    <option selected disabled">Sort by</option>
                    <option value="Unread">Unread</option>
                    <option value="Read">Read</option>
                    <option value="Transferred">Transferred</option>
                    <option value="Responded">Responded</option>
                </select>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>
        <div class="form-group mt-0 mb-5" style="overflow: hidden; overflow-y: scroll;">
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
                            @if($item['receiving_Brgy'] == session('barangay') && $isSearched == 'empty')
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
                            @elseif ($item['receiving_Brgy'] == session('barangay') && $isSearched == $item['status'])
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
