@extends('layouts.Police')

<!-- Page Title -->
@section('title', 'Police Reports')

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
<form action="police_reportsview/" {{ $incident->id() }}" method="POST">
    @csrf
    @method('PUT')
    <div class="container-fluid" style="overflow-y: scroll; overflow-x: hidden; height:600px;">
        <div style="text-align:center">
            <h1>
                Viewing Incident Report
            </h1>
        </div>
        <div class="row justify-content-end">
            <button class="btn btn-warning col-md-auto" >
                Transfer to Barangay for monitoring
            </button>
        </div>
        <div class="row mt-5">
            <div class="col-md-5 fw-bold " >Reference ID:&nbsp;<label>{{ $incident->id() }}</label></div>
            <div class="col-md-3 fw-bold ">Date & Time:&nbsp;<label>{{ $incident['sendDate'] }}</label></div>
        </div>
        <div class="row mt-2">
            <div class="col-md-5 fw-bold ">From:&nbsp;<label>{{ $incident['sender_FullName'] }}</label></div>
            <div class="col-md-3 fw-bold ">Location Link:&nbsp;<label><a href="{{ $incident['sender_locLink'] }}">Google Maps</a></label></div>
        </div>
        <div class="row mt-3">
            <div class="col-md-5 fw-bold ">Specific Location:&nbsp;<label>{{ $incident['sender_location'] }}</label></div>
            <div class="col-md-2 fw-bold ">Status:&nbsp;<label>{{ $incident['report_status'] }}</label></div>
        </div>
        <div class="row mt-5">
            <div class="row">
                <div class="col-md-3 fw-bold ">Message: </div>
            </div>
            <div class="row">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled="disabled">{{ $incident['distressMessageContent'] }}
                </textarea>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-10 fw-bold">
                Report Details:
                <textarea class="form-control" id="exampleFormControlTextarea2" rows="3" disabled="disabled">{{ $incident['reportDetails'] }}
                </textarea>
            </div>
                <div class="col-md-2">
                    <div class="row">
                        <div class="row">
                            <div class="fw-bold ">Time/Date Created:</div>
                        </div>
                        <div class="row">
                            <label>{{ $incident['reportTimeDate'] }}</label>
                        </div>
                        <div class="row">
                            <div class="fw-bold ">Report Created By:</div>
                        </div>
                        <div class="row">
                            <input type="text" class="form-control align-content-center w-100" disabled value="{{ $incident['reportCreator'] }}">
                        </div>
                        <div class="row">
                            <div class="fw-bold ">Position:</div>
                        </div>
                        <div class="row">
                            <input type="text" class="form-control align-content-center w-100" disabled value="{{ $incident['reportPosition'] }}">
                        </div>
                        <div class="row">
                            <div class="fw-bold ">Case Status:</div>
                        </div>
                        <div class="row">
                            <div class="col-md-auto">
                                <select class="form-select " name="CaseStatus" aria-label="Default select example">
                                    <option selected value="Ongoing">Ongoing</option>
                                    <option value="Closed">Closed</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-md-auto">
                                <button class="btn btn-primary " >
                                        Save
                                    </button>
                                </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="row justify-content-center mt-5 mb-5">
            <button onclick="Convert_HTML_To_PDF();" class="btn btn-success w-25" >
                Generate PDF
            </button>
        </div>
    </div>
</form>

@stop

<!-- Scripts -->
@section('scripts')
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
doc.addImage("https://scontent.fceb3-1.fna.fbcdn.net/v/t1.18169-9/296518_100871556693083_555695883_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=cdbe9c&_nc_eui2=AeGDbn8ebqoTFTPulmER9wucQtzs_W0mIbxC3Oz9bSYhvMVSz2Phg9rAbA3CdLfxGtq_UlRKZPRFYY2F-waLosMS&_nc_ohc=av4LFlRFCdoAX8tG8mC&tn=CZXNbGnBrPo31WJo&_nc_ht=scontent.fceb3-1.fna&oh=00_AfD4bph3SY9PliO2qaT_mPDoJVpnnJDgdq_ISGAFqjg1UQ&oe=63DDEE0A", "JPEG", 10, 10,30,30);
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
