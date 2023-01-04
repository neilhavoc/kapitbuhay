@extends('layouts.index')

<!-- Page Title -->
@section('title', 'User Feedbacks')

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

.modal-footer-text-center {
    text-align: center;
    margin-bottom: 1%;
}






</style>

@stop

<!-- Content -->
@section('content')
<div class="container search" style="overflow-y: scroll; overflow-x: hidden; height:600px;">
    <div class="row g-1">
    <div class="input-group mb-3">
  <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Sort By</button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="#">Separated link</a></li>
  </ul>
</div>
    </div>
    <div class="row">
    <div class="col-md-6  mb-0">
            <button class="btn btn-primary h-100  " type="button">Recent</button>
            <button class="btn btn-primary h-100  " type="button">List of User Feedbacks</button>
        </div>
    </div>
    <div class="form-group mt-0">
    <table class="table table-hover table-bordered text-center">
                <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd-1" class="col-lg-1">REC ID</th>
                        <th id="trs-hd-2" class="col-lg-2">From User</th>
                        <th id="trs-hd-3" class="col-lg-3">Date/Time</th>
                        <th id="trs-hd-4" class="col-lg-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($document == null)
                    <tr>
                        <td> - </td>
                        <td> - </td>
                        <td> - </td>
                    </tr>
                    @else
                        @foreach ($document as $item)
                            <tr class="justify-contents-center ">
                                <td>{{ $item['feedBack_ID'] }}</td>
                                <td>{{ $item['sender_name'] }}</td>
                                <td>{{ $item['feedback_DATE'] }}</td>
                                <td>
                                    <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $item->id() }}">
                                        View
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
    </div>


@if ($document == null)
    @else
    @foreach ($document as $item)
    <div class="modal fade" id="staticBackdrop{{ $item->id() }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">

                <div class="modal-content">
                    <form action="feedback/{{ $item->id() }}" method="GET">
                        @csrf
                        <div class="modal-header">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                            <h3 class="modal-title position-absolute top-30 start-50 translate-middle" id="staticBackdropLabel">View User Feedback</h3>
                        </div>
                        <div class="modal-body">
                            <div class="container border-secondary" style="height:400px; margin-top:0%; margin-bottom:0%;">
                                <div class="row">
                                    <div class="col-md-4 mb-2 fw-bold">
                                        Feedback ID:
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-4 ">
                                        <input name="feedBackID" id="feedBackID" type="text" class="form-control align-content-center w-100"  placeholder="{{ $item['feedBack_ID'] }}" disabled="disabled" >
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-8 fw-bold">Submitted By:</div>
                                </div>
                                <div class="row mt-2 ">
                                    <div class="col-md-3">
                                        <input name="senderName" id="senderName" type="text" class="form-control align-content-center w-100"  placeholder="{{ $item['sender_name'] }}" disabled="disabled" >
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-8 fw-bold">Date Created: </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <input name="date" id="date" type="text" class="form-control align-content-center w-100"  placeholder="{{ $item['feedback_DATE'] }}" disabled="disabled" >
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-md-8 fw-bold">Feedback Contents: </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-mb-3">
                                        <textarea class="feedbackContent" name="feedbackContent" id="exampleFormControlTextarea1" rows="3" disabled="disabled">{{ $item['feedback_contents'] }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

        </div>
    </div>
    @endforeach
@endif


@stop

<!-- Scripts -->
@section('scripts')
<script>


</script>

@stop
