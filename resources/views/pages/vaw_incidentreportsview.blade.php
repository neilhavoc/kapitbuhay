@extends('layouts.vaw')

<!-- Page Title -->
@section('title', 'Title')

<!-- Styles -->
@section('styles')
<style>

.profile{
    height: 170x;
    width: 200px;
}
.head-credential{
    font-size: 12px;
}
.modal-footer-text-center{
    text-align: center;
    padding-bottom: 50px;
}
.modal-profile
{
    width: 100%;
}
</style>

@stop

<!-- Content -->
@section('content')
<div class="container-fluid" style="overflow-y: scroll; overflow-x: hidden; height:600px;">
    <div style="text-align:center">
        <h1>
            View Incident Report
        </h1>
    </div>
    <div class="row mx-3" style="height: 100vh;">
        <div class="row">
            <div class="col-md-2">
                <img src="{{ $item['brgyLogo'] }}" alt="brgyLogo" class="profile">
            </div>
            <div class="col-md-8">
                <div class="row ms-3">
                    <h5 class="col-md-2">User ID: </h5>
                    <h5 id="userID" class="col-md-4">{{ $item->id() }}</h5>
                </div>
                <div class="row mt-1 ms-3">
                    <h5 class="col-md-4">Barangay Name:</h5>
                    <input type="text" disabled ="true" class="col-md-4" value="{{ $item['brgyName'] }}">
                </div>
                <div class="row mt-1 ms-3">
                    <h5 class="col-md-4">Contact No:</h5>
                    <input type="text" disabled ="true" class="col-md-4" value="{{ $item['brgyContactNum1'] }}">
                </div>
                <div class="row mt-1 ms-3">
                    <h5 class="col-md-4">Email:</h5>
                    <input type="text" disabled ="true" class="col-md-4" value="{{ $item['brgyEmail'] }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="row mx-3 mt-4" >
                <div class="row ">
                    <div class="col-md-3 fw-bold " >Reference ID:&nbsp;<label>{{ $item->id() }}</label></div>
                    <div class="col-md-6 fw-bold ">Date & Time:&nbsp;<label id="incident_date">{{ $item['sendDate'] }}</label></div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-3 fw-bold ">From:&nbsp;<label id="victim">{{ $item['sender_FullName'] }}</label></div>
                    <div class="col-md-3 fw-bold ">Location Link:&nbsp;<label><a href="{{ $item['sender_locLink'] }}">Google Maps</a></label></div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-3 fw-bold ">Specific Location:&nbsp;<label id="incident_location">{{ $item['sender_location'] }}</label></div>
                    <div class="col-md-3 fw-bold ">Status:&nbsp;<label>{{ $item['report_status'] }}</label></div>
                </div>
                <div class="row mt-3">
                    <div class="row">
                        <div class="col-md-3 fw-bold ">Message: </div>
                    </div>
                <div class="row">
                        <div class="col-md-6">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled="disabled">{{ $item['distressMessageContent'] }}
                            </textarea>
                        </div>
                </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-8 fw-bold">
                    Report Details:
                    <textarea class="form-control" id="exampleFormControlTextarea2" rows="3" disabled="disabled">{{ $item['reportDetails'] }}
                    </textarea>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="row">
                            <div class="fw-bold ">Time/Date Created:</div>
                        </div>
                        <div class="row">
                            <label id="creation_date">{{ $item['reportTimeDate'] }}</label>
                        </div>
                        <div class="row">
                            <div class="fw-bold ">Report Created By:</div>
                        </div>
                        <div class="row">

                            <div class="col-md-auto">
                                <input type="text" id="report_creator" class="form-control align-content-center w-75" disabled value="{{ $item['reportCreator'] }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="fw-bold ">Position:</div>
                        </div>
                        <div class="row">
                            <div class="col-md-auto">
                                <input type="text" class="form-control align-content-center w-75" disabled value="{{ $item['reportPosition'] }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="fw-bold ">Case Status:</div>
                        </div>
                        <form action="vaw_reports/{{ $item->id() }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-auto">
                                    <select class="form-select " name="CaseStatus" aria-label="Default select example">
                                        <option selected value="Ongoing">Ongoing</option>
                                        <option value="Closed">Closed</option>
                                    </select>
                                </div>
                                <div class="col-md-auto">
                                <button type="submit" class="btn btn-primary" >
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <button onclick="Convert_HTML_To_PDF();" class="btn btn-success w-25" >
                    Generate PDF
                </button>
            </div>
            <div class="col-md-4 fw-bold invisible" id="brgylogo" >{{ $brgyLogo['brgyLogo'] }}</div>
            <div class="col-md-4 fw-bold invisible" id="brgy" >{{ $item['barangay'] }}</div>
    </div>
</div>
@stop

<!-- Scripts -->
@section('scripts')
<script>
</script>
@stop
