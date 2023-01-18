@extends('layouts.Police')

<!-- Page Title -->
@section('title', 'Police Create Reports')

<!-- Styles -->
@section('styles')
<style>

</style>
@stop

<!-- Content -->
@section('content')
<div class="container-fluid" style="overflow-y: scroll; overflow-x: hidden; height:600px;">
    <form action="police_createReports" method="POST">
        @csrf
        <div style="text-align:center">
            <h1>
                Create Incident Report
            </h1>
        </div>
        <div class="container border-secondary" style="height:400px; margin-top:0%; margin-bottom:0%;">
            <div class="row mx-3 mt-4" >
                <div class="row ">
                    <div class="col-md-3 fw-bold " >Reference ID:&nbsp;<label>{{ $message['sosID' ]}}</label></div>
                        <input type="text" hidden="true" name="sosRefID" class="col-md-3" value="{{ $message['sosID'] }}">
                    <div class="col-md-5 fw-bold ">Date & Time:&nbsp;<label>{{ $message['sendDate'] }}</label></div>
                        <input type="text" hidden="true" name="sendDate" class="col-md-3" value="{{ $message['sendDate'] }}">
                </div>
                <div class="row mt-1">
                    <div class="col-md-3 fw-bold ">From:&nbsp;<label>{{ $message['sender_FullName'] }}</label></div>
                        <input type="text" hidden="true" name="sender_Name" class="col-md-3" value="{{ $message['sender_FullName'] }}">
                    <div class="col-md-3 fw-bold ">Location Link:&nbsp;<label><a href="{{ $message['location_link'] }}">Google Maps</a></label></div>
                        <input type="text" hidden="true" name="sender_locLink" class="col-md-3" value="{{ $message['location_link'] }}">
                </div>
                <div class="row mt-1">
                    <div class="col-md-3 fw-bold ">Specific Location:&nbsp;<label>{{ $message['user_location'] }}</label></div>
                        <input type="text" hidden="true" name="sender_loc" class="col-md-3" value="{{ $message['user_location'] }}">
                    <div class="col-md-3 fw-bold ">Status:&nbsp;<label>{{ $message['status'] }}</label></div>
                </div>
                <div class="row mt-3">
                    <div class="row">
                        <div class="col-md-3 fw-bold ">Message: </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled="disabled">{{ $message['distressMessage'] }}</textarea>
                            <input type="text" hidden="true" name="distressMessageContent" class="col-md-3" value="{{ $message['distressMessage'] }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
        <div class="col-md-8 fw-bold">
                Narrative Incident Report Details:
                <textarea class="form-control" name="reportDetails" id="exampleFormControlTextarea2" rows="3"></textarea>
                Person's Involve in the Incident/Specific Identification:
                <textarea class="form-control" name="reportDetails2" id="exampleFormControlTextarea3" rows="4"></textarea>
                Exact time and Location of the Incident(Time, Road, Zone, Barangay):
                <textarea class="form-control" name="reportDetails3" id="exampleFormControlTextarea4" rows="4"></textarea>
                Type of Incident:
                <select class="form-select" name="incident_type" aria-label="Default select example">
                                        <option selected value="Physical Abuse">Physical Violence</option>
                                        <option value="Sexual Violence">Sexual Violence</option>
                                        <option value="Emotional Violence">Emotional Violence</option>
                                        <option value="Child Abuse">Child Abuse</option>
                                    </select>
        </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="row">
                        <div class="fw-bold ">Time/Date Created:</div>
                    </div>
                    <div class="row">
                        <label>{{ $date }}</label>
                        <input type="text" hidden="true" name="incidentReportDate" class="col-md-3" value="{{ $date }}">
                    </div>
                    <div class="row">
                        <div class="fw-bold ">Report Created By:</div>
                    </div>
                    <div class="row">
                        <label>{{$police['policeOfficerName']}}</label>
                        <input type="text" name="reportCreator" hidden="true" class="form-control align-content-center w-75" value="{{ $police['policeOfficerName'] }}">
                    </div>
                    <div class="row">
                        <div class="fw-bold ">Position:</div>
                    </div>
                    <div class="row">
                        <label>{{$police['policePosition']}}</label>
                        <input type="text" name="position" hidden="true" class="form-control align-content-center w-75" value="{{ $police['policePosition'] }}">
                    </div>
                </div>
            </div>
            <div class="col-md-8 fw-bold">
                <button type="submit" class="btn btn-primary"> Save </button>
                <p>(Verified incidents will Automatically Notify Complaint Assigned Barangay VAW desk for the After Incident Monitoring)</p>
            </div>
        </div>
    </form>
</div>

@stop

<!-- Scripts -->
@section('scripts')

@stop
