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
    <form action="vaw_createhealthmonitoring" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mt-3 mx-5">
            <div class="row">
                <div class="col-md-auto">
                    Physical Health Monitoring Details:
                </div>
            </div>
            <div class="row">
                <div class="tab-pane fade show active" id="physical" role="tabpanel" aria-labelledby="physical-tab">
                    <textarea class="form-control" name="physicalmonitoring" id="physicalmonitoring" rows="3" required></textarea>
                </div>
            </div>
        </div>
        <div class="row mt-5 mx-2 justify-content-between">
            <div class="col-md-auto">
                <div class="row">
                    <div class="col-md-auto">
                        Upload Images of Victim's injury:
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-auto">
                        <input name="filephysicalmonitoring1" id="filephysicalmonitoring1" type="file" class="form-control align-content-center w-100" required>
                    </div>
                </div>
                <div class="row-md-auto">
                    <div class="col-md-auto">
                        <input name="filephysicalmonitoring2" id="filephysicalmonitoring2" type="file" class="form-control align-content-center w-100" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-auto">
                        <input name="filephysicalmonitoring3" id="filephysicalmonitoring3" type="file" class="form-control align-content-center w-100" required>
                    </div>
                </div>
            </div>
            <div class="col-md-auto">
                <div class="row">
                    <div class="col-md-auto">
                        Monitored By:
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-auto">
                        <input name="remarks" id="remarks" type="text" class="form-control align-content-center" value="{{session('vawstaffname')}}" disabled>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-auto">
                <button type="submit" class="btn btn-danger">Save</button>
            </div>
        </div>
    </form>
</div>
@stop

<!-- Scripts -->
@section('scripts')
@stop
