@extends('layouts.Police')

<!-- Page Title -->
@section('title', 'Police Reports')

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
<div class="container search" style="overflow: hidden; overflow-y: scroll;">
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
            <button class="btn btn-primary h-100" type="button">List of Incident Reports</button>
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
                        @if ($item['creatorType'] == 'police')
                            <tr class="justify-contents-center ">
                                <td>{{ $item->id() }}</td>
                                <td>{{ $item['sender_FullName'] }}</td>
                                <td>{{ $item['reportTimeDate'] }}</td>
                                <td>{{ $item['reportPosition'] }} {{ $item['reportCreator'] }}</td>
                                <td>{{ $item['report_status'] }}</td>
                                <td>
                                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewReport{{ $item->id() }}">
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
    <div class="modal fade" id="viewReport{{ $item->id() }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                    <h3 class="modal-title position-absolute top-30 start-50 translate-middle" id="staticBackdropLabel">Viewing Incident Report</h3>
                </div>
                <div class="modal-body">
                    <div class="container border-secondary" style="height:400px; margin-top:0%; margin-bottom:0%;">
                        <div class="row mt-5">
                            <div class="col-md-5 fw-bold " >Reference ID:&nbsp;<label>{{ $item->id() }}</label></div>
                            <div class="col-md-3 fw-bold ">Date & Time:&nbsp;<label>{{ $item['sendDate'] }}</label></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-5 fw-bold ">From:&nbsp;<label>{{ $item['sender_FullName'] }}</label></div>
                            <div class="col-md-3 fw-bold ">Location Link:&nbsp;<label><a href="{{ $item['sender_locLink'] }}">Google Maps</a></label></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-5 fw-bold ">Specific Location:&nbsp;<label>{{ $item['sender_location'] }}</label></div>
                            <div class="col-md-2 fw-bold ">Status:&nbsp;<label>{{ $item['report_status'] }}</label></div>
                        </div>
                        <div class="row mt-5">
                            <div class="row">
                                <div class="col-md-3 fw-bold ">Message: </div>
                            </div>
                            <div class="row">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled="disabled">{{ $item['distressMessageContent'] }}
                                </textarea>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-10 fw-bold">
                                Report Details:
                                <textarea class="form-control" id="exampleFormControlTextarea2" rows="3" disabled="disabled">{{ $item['reportDetails'] }}
                                </textarea>
                            </div>
                                <div class="col-md-2">
                                    <div class="row">
                                        <div class="row">
                                            <div class="fw-bold ">Time/Date Created:</div>
                                        </div>
                                        <div class="row">
                                            <label>{{ $item['reportTimeDate'] }}</label>
                                        </div>
                                        <div class="row">
                                            <div class="fw-bold ">Report Created By:</div>
                                        </div>
                                        <div class="row">
                                            <input type="text" class="form-control align-content-center w-100" disabled value="{{ $item['reportCreator'] }}">
                                        </div>
                                        <div class="row">
                                            <div class="fw-bold ">Position:</div>
                                        </div>
                                        <div class="row">
                                            <input type="text" class="form-control align-content-center w-100" disabled value="{{ $item['reportPosition'] }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif
@stop

<!-- Scripts -->
@section('scripts')

@stop
