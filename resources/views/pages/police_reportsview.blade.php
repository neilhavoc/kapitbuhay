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
    <div class="container-fluid" style="overflow-y: scroll; overflow-x: hidden; height:600px;">
        <form action="police_reportsview/{{ $incident->id() }}" method="POST">
            @csrf
            @method('PUT')
            <div style="text-align:center">
                <h1>
                    Viewing Incident Report
                </h1>
            </div>
            <div class="row mt-5">
                <div class="col-md-5 fw-bold " >Reference ID:&nbsp;<label id="">{{ $incident->id() }}</label></div>
                <div class="col-md-3 fw-bold ">Date & Time:&nbsp;<label id="incident_date">{{ $incident['sendDate'] }}</label></div>
            </div>
            <div class="row mt-2">
                <div class="col-md-5 fw-bold ">From:&nbsp;<label id="victim">{{ $incident['sender_FullName'] }}</label></div>
                <div class="col-md-3 fw-bold ">Location Link:&nbsp;<label id="incident_location"><a href="{{ $incident['sender_locLink'] }}">Google Maps</a></label></div>
            </div>
            <div class="row mt-3">
                <div class="col-md-5 fw-bold ">Specific Location:&nbsp;<label>{{ $incident['sender_location'] }}</label></div>
                <div class="col-md-2 fw-bold ">Status:&nbsp;<label id="report_status">{{ $incident['report_status'] }}</label></div>
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
                                <label id="creation_date">{{ $incident['reportTimeDate'] }}</label>
                            </div>
                            <div class="row">
                                <div class="fw-bold ">Report Created By:</div>
                            </div>
                            <div class="row">
                                <input type="text" name="reportCreator" id="report_creator" class="form-control align-content-center w-100" disabled value="{{ $incident['reportCreator'] }}">
                            </div>
                            <div class="row">
                                <div class="fw-bold ">Position:</div>
                            </div>
                            <div class="row">
                                <input type="text" name="position" id="report_creator_position" class="form-control align-content-center w-100" disabled value="{{ $incident['reportPosition'] }}">
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
        </form>
        <div class="row justify-content-center mt-5 mb-5">
            <button onclick="Convert_HTML_To_PDF();" class="btn btn-success w-25" >
                Generate PDF
            </button>
            <input type="text" hidden="true" name="distressID" class="col-md-3" value="{{ $incident['reportCreatorID'] }}">
            <input type="text" name="position" hidden="true" class="form-control align-content-center w-75" value="{{ $incident['policePosition'] }}">
        </div>
    </div>

@stop

<!-- Scripts -->
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://unpkg.com/jspdf-autotable@3.5.28/dist/jspdf.plugin.autotable.js"></script>
<script>
//var logo_img = document.getElementById('brgylogo').textContent;
//var barangay = document.getElementById('brgy').textContent;
var incident_date = document.getElementById('incident_date').textContent;
var victim = document.getElementById('victim').textContent;
var incident_location = document.getElementById('incident_location').textContent;
var creation_date = document.getElementById('creation_date').textContent;
var report_status = document.getElementById('report_status').textContent;
var report_creator = document.getElementById('report_creator').value;
var report_details = document.getElementById("exampleFormControlTextarea2").value;
var report_creator_position = document.getElementById("report_creator_position").value;

window.jsPDF = window.jspdf.jsPDF;
// Convert HTML content to PDF
function Convert_HTML_To_PDF() {
    var doc = new jsPDF();

doc.setFont("helvetica");
doc.setFontSize(12);
doc.text("Republic of the Philippines", 105, 20,null,null,"center");
doc.text("NATIONAL POLICE COMMISSION", 105, 25,null,null,"center");
doc.text("PHILLIPINE NATIONAL POLICE", 105, 30,null,null,"center");
doc.setFont("helvetica", "bold");
doc.text("MABOLO POLICE STATION ", 105, 35,null,null,"center");
doc.setFont("helvetica","normal");
doc.text("CEBU CITY ", 105, 40,null,null,"center");
doc.addImage("https://scontent.fceb3-1.fna.fbcdn.net/v/t1.18169-9/296518_100871556693083_555695883_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=cdbe9c&_nc_eui2=AeGDbn8ebqoTFTPulmER9wucQtzs_W0mIbxC3Oz9bSYhvMVSz2Phg9rAbA3CdLfxGtq_UlRKZPRFYY2F-waLosMS&_nc_ohc=av4LFlRFCdoAX8tG8mC&tn=CZXNbGnBrPo31WJo&_nc_ht=scontent.fceb3-1.fna&oh=00_AfD4bph3SY9PliO2qaT_mPDoJVpnnJDgdq_ISGAFqjg1UQ&oe=63DDEE0A", "JPEG", 10, 12,30,30);
doc.setFont("helvetica", "bold");
doc.text("INCIDENT REPORT ", 20, 60,null,null,null);
doc.setFont("helvetica","normal");
//doc.text("FOR                     : ", 20, 70,null,null,null);
//doc.text("FROM                  : ", 20, 80,null,null,null);
//doc.text("SUBJECT            : ", 20, 70,null,null,null);
doc.text("REPORT DATE   : " + creation_date, 20, 80,null,null,null);
doc.text("__________________________________________________________________", 20, 90,null,null,null);
doc.setFont("helvetica","bold");
doc.text("REPORT DETAILS : ", 20, 100,null,null,null);
doc.setFont("helvetica","normal");


doc.autoTable({
  //styles: { fillColor: [255, 0, 0] },
  startY:110,
  font: 'helvetica',
  //fontSize: 12,
  theme: 'plain',
  columnStyles: { 0: {  fontSize: 12,} },
  body: [
    ['       ' + report_details],

  ],
})
doc.setFont("helvetica","bold");
doc.text(report_creator, 140, 270,null,null,null);
doc.setFont("helvetica","normal");
doc.text(report_creator_position, 140, 275,null,null,null);

doc.save('document.pdf');
}

</script>
@stop
