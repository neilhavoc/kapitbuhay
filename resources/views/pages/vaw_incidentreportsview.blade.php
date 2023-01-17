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
                    Narrative Incident Report Details:
                    <textarea class="form-control" name="reportDetails" id="exampleFormControlTextarea2" disabled="disabled">{{ $incident['reportDetails'] }}</textarea>
                    Person's Involve in the Incident:
                    <textarea class="form-control" name="reportDetails2" id="exampleFormControlTextarea3" disabled="disabled">{{ $incident['reportDetails2'] }}</textarea>
                    Exact time and Location of the Incident(Time, Road, Zone, Barangay):
                    <textarea class="form-control" name="reportDetails3" id="exampleFormControlTextarea4" disabled="disabled">{{ $incident['reportDetails3'] }}</textarea>
                    Type of Incident:
                    <textarea class="form-control" name="reportDetails4" id="exampleFormControlTextarea5" disabled="disabled">{{ $incident['type_of_incident'] }}</textarea>
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
                        <form action="vaw_incidentreportview/{{ $incident->id() }}" method="POST">
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
                        <div style="display: none" id="report_status" >{{ $incident['report_status'] }}</div>
                        <div style="display: none" id="brgylogo" >{{ $brgyLogo['brgyLogo'] }}</div>
                        <div style="display: none" id="brgy" >{{ $brgyLogo['barangay'] }}</div>
    </div>

@stop

<!-- Scripts -->
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://unpkg.com/jspdf-autotable@3.5.28/dist/jspdf.plugin.autotable.js"></script>
<script>
//var logo_img = document.getElementById('brgylogo').textContent;
var barangay = document.getElementById('brgy').textContent;
var incident_date = document.getElementById('incident_date').textContent;
var victim = document.getElementById('victim').textContent;
var involve = document.getElementById('exampleFormControlTextarea3').value;
var incident_type = document.getElementById('exampleFormControlTextarea5').value;
var incident_location = document.getElementById('exampleFormControlTextarea4').value;
var creation_date = document.getElementById('creation_date').textContent;
var report_status = document.getElementById('report_status').textContent;
var report_creator = document.getElementById('report_creator').value;
var report_details = document.getElementById("exampleFormControlTextarea2").value;

var logo_img = 'https://scontent.fceb3-1.fna.fbcdn.net/v/t1.18169-9/268568_10150219891722775_3261354_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=cdbe9c&_nc_eui2=AeF6gBxbZ-zxX4XJXRHq2xK9zF0e0KXGMaDMXR7QpcYxoOkE0__b2FkYF1ipK8-_Qjk7BQXCexwPWTNu9BO_AC7T&_nc_ohc=CHNnI5TzS0gAX-OeCjz&_nc_ht=scontent.fceb3-1.fna&oh=00_AfA6UiRxOeuwlCjbJ1BNiTAUZbjv9hrPANyZyWdcFiK9OQ&oe=63DE225E'
window.jsPDF = window.jspdf.jsPDF;
var mabolo_logo = 'https://scontent.fceb3-1.fna.fbcdn.net/v/t39.30808-6/310140411_415424797401909_5713781217450722707_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeEOB9PIfWy6TyM1w_BDRjZgytgEoHp0AaLK2ASgenQBovzDUoE0Yajin-e7l_mfQDUu6wAIoClq1ORw1whN7wEJ&_nc_ohc=XeOWoZdmsHcAX8JU1l9&_nc_ht=scontent.fceb3-1.fna&oh=00_AfAVLtbzlkQPPrPWhsYv6BzIzGUo8MkpbRAzbZh7_iXMIA&oe=63CAFF22'
var lahug_logo = 'https://scontent.fceb3-1.fna.fbcdn.net/v/t1.6435-9/134049684_838792583583201_7523817186570954022_n.png?_nc_cat=105&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeERszkBz8Hdtkx8xbVA8vJ7f7euoZkAUhN_t66hmQBSE-mQQz6FGt_-M5XhNCzC9RNTu35LzFBX16gGjMHz3FEv&_nc_ohc=bO8K9UR2JDkAX8nrKFN&tn=ZuH1WNSOVatA01uB&_nc_ht=scontent.fceb3-1.fna&oh=00_AfDEvyF26l60HrS4yT_XggjXoqMMBZ4xLOhJ_HZgpI0KHg&oe=63EE2DF8';
var apas_logo = 'https://scontent.fceb3-1.fna.fbcdn.net/v/t1.6435-9/37390749_303659613714325_606709090277654528_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeGW_rnf20XQ9tqdUTKx3E-0UQSDh_cf2LNRBIOH9x_Ys3UJzXoPIWXTHb16XTaTS9to59NtdVsCCIc6C8MxVk1-&_nc_ohc=FXFraXW6oh0AX-f3gi7&_nc_ht=scontent.fceb3-1.fna&oh=00_AfBWeCPZObH83KiK1bqwQBu9J5mfb714Ntdk6cpVk7C2Pw&oe=63EDF6AD'
var luz_logo = 'https://scontent.fceb3-1.fna.fbcdn.net/v/t39.30808-6/271233751_283864047104903_1843354317895849483_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeHpEDFRdARNEjswSWzu2OmNAIhDYB6nTgwAiENgHqdODOaYCIELqV5tTb9tofDsmZeYLTQwIxvxAlP9PqVxWt2Y&_nc_ohc=A-12HB4zMMEAX-OPTcV&_nc_ht=scontent.fceb3-1.fna&oh=00_AfAktb-7F-B5jrwlSlw_OvfCqscUw4U65a08Siq5juLw1Q&oe=63CC055C'
var kasambagan_logo = 'https://scontent.fceb3-1.fna.fbcdn.net/v/t31.18172-8/1559472_641792742568326_8208207190343495535_o.jpg?_nc_cat=110&ccb=1-7&_nc_sid=19026a&_nc_eui2=AeF2MkEwBSx2HMq1q9E4U0V4ky6pFSLqoe6TLqkVIuqh7qPueBilqpKpmgkMOSDHh6CcyHpEiFWFXiXEHiOjvAlN&_nc_ohc=xaUmQOFG5_QAX-lLfEF&_nc_ht=scontent.fceb3-1.fna&oh=00_AfAMJ82K6KuiRJyyzvMowqjyGssOJsQkzsQ50e42Any7xQ&oe=63EE2932'
// Convert HTML content to PDF
var logo_toUse;
function Convert_HTML_To_PDF() {
    var doc = new jsPDF();


if(barangay == 'Mabolo'){
    logo_toUse = mabolo_logo;
}
if(barangay == 'Lahug'){
    logo_toUse = lahug_logo;
}
if(barangay == 'Luz'){
    logo_toUse = luz_logo;
}
if(barangay == 'Kasambagan'){
    logo_toUse = kasambagan_logo;
}
if(barangay == 'Apas'){
    logo_toUse = apas_logo;
}



doc.setFont("helvetica", "bold");
doc.setFontSize(14);
//doc.text("This is centred text.", 105, 80, null, null, "center");
doc.text("Republic of the Philippines", 105, 20,null,null,"center");
doc.text("Province of Cebu", 105, 25,null,null,"center");
doc.text("City of Cebu", 105, 30,null,null,"center");
doc.setFont("times", "bold");
doc.text("BARANGAY " + barangay, 105, 35,null,null,"center");
doc.text("-ooOoo-", 105, 40,null,null,"center");
doc.addImage(logo_toUse, "JPEG", 15, 10,30,30);
doc.addImage(logo_img, "JPEG", 165, 10, 30, 30);
//doc.addImage("examples/images/Octonyan.jpg", "JPEG", 170, 10,30,30);
doc.autoTable({
  //styles: { fillColor: [255, 0, 0] },
  startY:50,
  theme: 'grid',
  columnStyles: { 0: {cellWidth: 40, fontStyle:'bold'} }, // Cells in first column centered and green
  margin: { top: 10 },
  body: [
    ['Inclusive Dates and Time of Incident', incident_date],
    ['Exact Location of Incident', incident_location],
    ['Involved Person/Specific Identification', involve],
    ['Type of Incident', incident_type],
    ['Narrative Details of Incident', report_details],
    ['Case Status', report_status],
  ],
})


doc.autoTable({
  //styles: { fillColor: [255, 0, 0] },
  startY:200,
  theme: 'grid',
  //columnStyles: { 0: {cellWidth: 40, fontStyle:'bold'} }, // Cells in first column centered and green
  //margin: { top: 10 },
  body: [
    [{content:'Report Creation Date:', styles: {minCellHeight: 30,cellWidth: 40,fontStyle:'bold'}}, creation_date],
    [{content: 'Report Created By:', styles: {minCellHeight: 30,cellWidth: 40,fontStyle:'bold'}}, report_creator],

    // ...
  ],
})
//doc.addPage();
// Save the PDF
doc.save('BARANGAY_'+barangay+'_'+victim+'.pdf');
//window.location.href = "/vaw_incidentreportview";
}
</script>
@stop
