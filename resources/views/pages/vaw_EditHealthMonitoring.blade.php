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
<div class="container-fluid" style="overflow-y: scroll; overflow-x: hidden; height:560px;">
    <div class="row mt-5">
        <div class="col-md-3">
            <a class="btn btn-secondary" href="vaw_updatehealthmonitoring" role="button">Back</a>
        </div>
        <div class="col-md-auto">
            <h1>
                Victims Health Status Monitoring Day {{$day}}
            </h1>
        </div>
    </div>
    <div class="row mt-3 mx-5">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="physical-tab" data-bs-toggle="tab" data-bs-target="#physical" type="button" role="tab" aria-controls="physical" aria-selected="true">Physical Health</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="mental-tab" data-bs-toggle="tab" data-bs-target="#mental" type="button" role="tab" aria-controls="mental" aria-selected="false">Mental Health</button>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="physical" role="tabpanel" aria-labelledby="physical-tab">
                <textarea class="form-control" name="physicalmonitoring" id="physicalmonitoring" rows="3" disabled>{{$report['physicalmon_details']}}</textarea>
            </div>
            <div class="tab-pane fade" id="mental" role="tabpanel" aria-labelledby="mental-tab">THIS IS Mental tab</div>
          </div>
    </div>
    <div class="row mt-5 mx-1 justify-content-evenly">
        <!-- <div class="col-md-auto">
            <div class="row">
                <div class="col-md-auto">
                    Remarks:
                </div>
            </div>
            <div class="row">
                <div class="col-md-auto">
                    <textarea class="form-control" name="remarks" id="remarks" rows="3" required></textarea>
                </div>
            </div>
        </div>-->
        <div class="col-md-auto">
           <!-- <div class="row">
                <div class="col-md-auto">
                    Monitoring Status:
                </div>
            </div>
            <div class="row">
                <div class="col-md-auto">
                    <select class="form-select" name="monstatus" id="monstatus" aria-label="Monitoring selection">
                        <option selected disabled>Ongoing</option>
                        <option value="Closed">Closed</option>
                      </select>
                </div>
            </div>-->
            <div class="row">
                <div class="col-md-auto">
                    Monitored By:
                </div>
            </div>
            <div class="row">
                <div class="col-md-auto">
                    <input name="remarks" id="remarks" type="text" class="form-control align-content-center" value="{{$report['physicalmon_monitoredby']}}" disabled>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-md-auto">
            <button type="submit" class="btn btn-danger">Save</button>
        </div>
    </div>

</div>
@stop

<!-- Scripts -->
@section('scripts')
@stop
