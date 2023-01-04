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
<div class="container search" style="overflow-y: scroll; overflow-x: hidden; height:600px;">
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
                        <th id="trs-hd-1" class="col-lg-2">User ID</th>
                        <th id="trs-hd-2" class="col-lg-2">Name</th>
                        <th id="trs-hd-3" class="col-lg-4">Address</th>
                        <th id="trs-hd-5" class="col-lg-2">Contact No.</th>
                        <th id="trs-hd-6" class="col-lg-2">Monitoring Status</th>
                        <th id="trs-hd-7" class="col-lg-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($reports == null)
                        <tr class="justify-contents-center ">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @else
                        @foreach ($reports as $item)
                        <tr class="justify-contents-center ">
                            <td>{{ $item->id() }}</td>
                            <td>{{ $item['victimFullName'] }}</td>
                            <td>{{ $item['victimAddress'] }}</td>
                            <td>{{ $item['victimPhoneNum'] }}</td>
                            <td>{{ $item['monitoring_status'] }}</td>
                            <td>
                                <form action="vaw_monitoring" method="POST">
                                    @csrf
                                    <input type="text" hidden="true" name="monitoringID" class="col-md-3" value="{{ $item->id() }}">
                                    <button type="submit" class="btn btn-warning"> Update </button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
</div>
@stop

<!-- Scripts -->
@section('scripts')

@stop
