@extends('layouts.Vaw')

<!-- Page Title -->
@section('title', 'Title')

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
                        <th id="trs-hd-1" class="col-lg-1">REF ID</th>
                        <th id="trs-hd-2" class="col-lg-3">Sender</th>
                        <th id="trs-hd-3" class="col-lg-3">Record Date/Time</th>
                        <th id="trs-hd-4" class="col-lg-3">Created By</th>
                        <th id="trs-hd-5" class="col-lg-3">Status</th>
                        <th id="trs-hd-6" class="col-lg-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($incident == null)
                        <tr class="justify-contents-center ">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @else
                        @foreach ($incident as $item)
                            @if ($item['barangay'] == session('barangay'))
                                <tr class="justify-contents-center ">
                                    <td>{{ $item->id() }}</td>
                                    <td>{{ $item['sender_FullName'] }}</td>
                                    <td>{{ $item['reportTimeDate'] }}</td>
                                    <td>{{ $item['reportCreator'] }}</td>
                                    <td>{{ $item['report_status'] }}</td>
                                    <td>
                                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $item->id() }}">
                                            View
                                        </button>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
</div>

@if ($incident == null)
@else
    @foreach ($incident as $item)
        <div class="modal fade" id="staticBackdrop{{ $item->id() }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                {{-- <h3 class="modal-title position-absolute top-25 start-50 translate-middle" id="staticBackdropLabel">Review Distress Message</h3> --}}
                    </div>
                    <div class="modal-body">
                        <h3 class="text-center">View Incident Report</h3>
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
            </div>
        </div>
    @endforeach
@endif
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
