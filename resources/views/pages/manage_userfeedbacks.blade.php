@extends('layouts.index')

<!-- Page Title -->
@section('title', 'Title')

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
<div class="container search">   
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
                <tr class="justify-contents-center ">
                        <td>01</td>
                        <td>Sample</td>
                        <td>Sample</td>
                        <td><button class="btn btn-warning" type="button">View</button></td>
                    </tr>
                </tbody>
    </div>
    
    
</div>

@stop

<!-- Scripts -->
@section('scripts')
<script>


</script>

@stop