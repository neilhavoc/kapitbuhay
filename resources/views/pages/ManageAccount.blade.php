@extends('layouts.index')


@section('styles')
<link rel="stylesheet" href="{{ asset('css/Sidebar-Menu-sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Sidebar-Menu.css') }}">
@stop

@section('content')
<div id="wrapper">
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand"> <a href="#">User Accounts</a></li>
            <li> <a href="ManageAccount.php">Victim</a></li>
            <li> <a href="#">Police</a></li>
            <li> <a href="#">Vaw</a></li>
        </ul>
    </div>
    <div class="page-content-wrapper">
        <div class="container-fluid"><a id="menu-toggle" class="btn btn-link" role="button" href="#menu-toggle"><i class="fa fa-bars"></i></a>

        </div>
    </div>
</div>
@stop


@section('scripts')
<!-- find this script -->
<!--<script type="text/javascript" src="assets/js/Sidebar-Menu.js"></script>-->
@stop
