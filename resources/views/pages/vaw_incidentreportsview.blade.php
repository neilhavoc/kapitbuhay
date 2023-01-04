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
<form action="vaw_incidentreportview/{{ $incident->id() }}" method="POST">
    @csrf
    @method('PUT')
    <div class="container-fluid" style="overflow-y: scroll; overflow-x: hidden; height:600px;">
        <div style="text-align:center">
            <h1>
                View Incident Report
            </h1>
        </div>
        <div class="row mx-3" style="height: 100vh;">
            <div class="row ">
                <div class="col-md-3 fw-bold " >Reference ID:&nbsp;<label>{{ $incident->id() }}</label></div>
                <div class="col-md-6 fw-bold ">Date & Time:&nbsp;<label id="incident_date">{{ $incident['sendDate'] }}</label></div>
            </div>
            <div class="row mt-1">
                <div class="col-md-3 fw-bold ">From:&nbsp;<label id="victim">{{ $incident['sender_FullName'] }}</label></div>
                <div class="col-md-3 fw-bold ">Location Link:&nbsp;<label><a href="{{ $incident['sender_locLink'] }}">Google Maps</a></label></div>
            </div>
            <div class="row mt-1">
                <div class="col-md-3 fw-bold ">Specific Location:&nbsp;<label id="incident_location">{{ $incident['sender_location'] }}</label></div>
                <div class="col-md-3 fw-bold ">Status:&nbsp;<label>{{ $incident['report_status'] }}</label></div>
            </div>
            <div class="row mt-3">
                <div class="row">
                    <div class="col-md-3 fw-bold ">Message: </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled="disabled">{{ $incident['distressMessageContent'] }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-8 fw-bold">
                    Report Details:
                    <textarea class="form-control" id="exampleFormControlTextarea2" rows="3" disabled="disabled">{{ $incident['reportDetails'] }}</textarea>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="row">
                            <div class="fw-bold ">Time/Date Created:</div>
                        </div>
                        <div class="row">
                            <label id="creation_date">{{ $incident['reportTimeDate'] }}</label>
                        </div>
                        <div class="row">
                            <div class="fw-bold ">Report Created By:</div>
                        </div>
                        <div class="row">
                            <div class="col-md-auto">
                                <input type="text" id="report_creator" class="form-control align-content-center w-75" disabled value="{{ $incident['reportCreator'] }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="fw-bold ">Position:</div>
                        </div>
                        <div class="row">
                            <div class="col-md-auto">
                                <input type="text" class="form-control align-content-center w-75" disabled value="{{ $incident['reportPosition'] }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="fw-bold ">Case Status:</div>
                        </div>
                        <form action="vaw_reports/{{ $incident->id() }}" method="POST">
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
                        <div class="row justify-content-center mt-5 mb-5">
                            <button onclick="Convert_HTML_To_PDF();" class="btn btn-success w-25" >
                                Generate PDF
                            </button>
                        </div>
                        <div style="display: none" id="brgylogo" >{{ $brgyLogo['brgyLogo'] }}</div>
                        <div style="display: none" id="brgy" >{{ $brgyLogo['barangay'] }}</div>{{--  --}}
    </div>
</form>

@stop

<!-- Scripts -->
@section('scripts')
<script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://unpkg.com/jspdf-autotable@3.5.28/dist/jspdf.plugin.autotable.js"></script>
<script>
var logo_img = document.getElementById('brgylogo').textContent;
var barangay = document.getElementById('brgy').textContent;
var incident_date = document.getElementById('incident_date').textContent;
var victim = document.getElementById('victim').textContent;
var incident_location = document.getElementById('incident_location').textContent;
var creation_date = document.getElementById('creation_date').textContent;
var report_creator = document.getElementById('report_creator').value;
var report_details = document.getElementById("exampleFormControlTextarea2").value;


window.jsPDF = window.jspdf.jsPDF;

// Convert HTML content to PDF
function Convert_HTML_To_PDF() {
    var doc = new jsPDF();

doc.setFont("helvetica", "bold");
doc.setFontSize(14);
//doc.text("This is centred text.", 105, 80, null, null, "center");
doc.text("Republic of the Philippines", 105, 20,null,null,"center");
doc.text("Province of Cebu", 105, 25,null,null,"center");
doc.text("City of Cebu", 105, 30,null,null,"center");
doc.setFont("times", "bold");
doc.text("BARANGAY " + barangay, 105, 35,null,null,"center");
doc.text("-ooOoo-", 105, 40,null,null,"center");
doc.addImage(logo_img, "JPEG", 10, 10,30,30);
//doc.addImage("examples/images/Octonyan.jpg", "JPEG", 170, 10,30,30);
doc.autoTable({
  //styles: { fillColor: [255, 0, 0] },
  startY:50,
  columnStyles: { 0: {cellWidth: 40, fontStyle:'bold'} }, // Cells in first column centered and green
  margin: { top: 10 },
  body: [
    ['Inclusive Dates and Time of Incident', incident_date],
    ['Exact Location of Incident', incident_location],
    ['Involved Person/Specific Identification', victim],
    ['Narrative Details of Incident', report_details],
    ['Case Status', barangay],


    // ...
  ],
})


doc.autoTable({
  //styles: { fillColor: [255, 0, 0] },
  startY:200,
  //columnStyles: { 0: {cellWidth: 40, fontStyle:'bold'} }, // Cells in first column centered and green
  //margin: { top: 10 },
  body: [
    ['Report Creation Date:', creation_date],
    [{content: 'Report Created By:', styles: {minCellHeight: 30,cellWidth: 40,fontStyle:'bold'}}, report_creator],

    // ...
  ],
})
//doc.addPage();




// Save the PDF
doc.save('document.pdf');
}
</script>
@stop
