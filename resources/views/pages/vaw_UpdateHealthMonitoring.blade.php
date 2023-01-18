@extends('layouts.Vaw')

<!-- Page Title -->
@section('title', 'Vaw Review Distress')

<!-- Styles -->
@section('styles')
<style>
    .profile{
    height: 170x;
    width: 200px;
}
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
<div class="container-fluid" style="overflow-y: scroll; overflow-x: hidden; height:600px;">
    <div style="text-align:center">
        <h1>
            Victims Health Status Monitoring
        </h1>
    </div>
    <div class="row mx-3" style="height: 100vh;">
        <div class="row mb-3">
            <div class="col-md-2 mx-5">
                <img src="{{ $monitor['victim_image'] }}" alt="Ball" class="profile">


            </div>
            <div class="col-md-8">
                <div class="row mt-1">
                    <h5 class="col-md-2">Victim Name:</h5>
                    <input type="text" disabled ="true" class="col-md-4" value="{{ $monitor['victimFullName'] }}">
                </div>
                <div class="row mt-1">
                    <h5 class="col-md-2">Address:</h5>
                    <input type="text" disabled ="true" class="col-md-4" value="{{ $monitor['victimAddress'] }}">
                </div>
                <div class="row mt-1">
                    <h5 class="col-md-2">Phone Number:</h5>
                    <input type="text" disabled ="true" class="col-md-4" value="{{ $monitor['victimPhoneNum'] }}">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="form-group mt-0">
                <table class="table table-hover table-bordered text-center">
                    <thead class="bill-header cs">
                        <tr>
                            <th id="trs-hd-1" class="col-lg-1">Day of Monitoring</th>
                            <th id="trs-hd-2" class="col-lg-1">Date Created</th>
                            <th id="trs-hd-3" class="col-lg-1">Physical Health Status</th>
                            <th id="trs-hd-4" class="col-lg-1">Mental Health Status</th>
                            <th id="trs-hd-5" class="col-lg-1"></th>
                            <th id="trs-hd-6" class="col-lg-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($report == null)

                        @else
                            @foreach ($report as $data)
                                <tr class="justify-contents-center ">
                                    <td>Day {{ $data['monitoring_day'] }}</td>
                                    <td>{{ $data['physicalmon_datecreated'] }}</td>
                                    <td>Monitored</td>
                                    @if ($monitor['mentalhealth_form'] != 'send' && ($data['mentalhealth_id'] == '' || $data['mentalhealth_id'] == null))
                                        <td>Not Sent</td>
                                    @elseif ($data['mentalhealth_id'] == '' || $monitor['mentalhealth_form'] == 'send')
                                        <td>Not Yet Answered</td>
                                    @else
                                        <td>Answered</td>
                                    @endif
                                    <td>
                                        <form action="vaw_updatehealthmonitoring/{{ $monitor->id() }}" method="POST">
                                            @csrf
                                            @method ('PUT')
                                            <input type="text" hidden="true" name="phyMonID" class="col-md-3" value="{{ $data->id() }}">
                                            @if ($data['mentalhealth_id'] == '' && $monitor['mentalhealth_form'] != 'send')
                                                <button type="submit" class="btn btn-primary">Send Mental Health Form</button>
                                            @else
                                                <button type="submit" class="btn btn-primary" disabled>Send Mental Health Form</button>
                                            @endif
                                        </form>
                                    </td>
                                    <td>
                                        <form action="vaw_updatehealthmonitoring" method="POST">
                                            @csrf
                                            <input type="text" hidden="true" name="phyMonID" class="col-md-3" value="{{ $data->id() }}">
                                            <button type="submit" class="btn btn-warning"> View </button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <a href="vaw_createhealthmonitoring" class="btn btn-warning" role="button" aria-disabled="true">Create New Record</a>
            </div>
            <div class="col-md-3">
                <button class="btn btn-success">
                    Send Notification
                </button>
            </div>
        </div>
    </div>
</div>
@stop

<!-- Scripts -->
@section('scripts')
@stop
