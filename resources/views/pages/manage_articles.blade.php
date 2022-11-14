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
        <div class="col-md-5">
            <input class= "container-fluid h-100" type="text" placeholder="Search">
        </div>
        <div class="col-md-6 ">
            <button class="btn btn-primary h-100 " type="button">Create New Article</button>
        </div>
    </div>
    <div class="form-group mt-5">
    <table class="table table-hover table-bordered text-center">
                <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd-1" class="col-lg-1">ID</th>
                        <th id="trs-hd-2" class="col-lg-2">Article Name</th>
                        <th id="trs-hd-3" class="col-lg-3">Date Created</th>
                        <th id="trs-hd-4" class="col-lg-2"></th>
                        <th id="trs-hd-5" class="col-lg-2"></th>
                    </tr>
                </thead>
                <tbody>
                <tr class="justify-contents-center ">
                        <td>01</td>
                        <td>Sample</td>
                        <td>Sample</td>
                        <td><button class="btn btn-success" type="button">Update</button></td>
                        <td><button class="btn btn-danger" type="button">Delete</button></td>
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