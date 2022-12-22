@extends('layouts.index')

<!-- Page Title -->
@section('title', 'Dashboard')

<!-- Styles -->
@section('styles')
<style>
.container text-center {
    margin-top: 100%;
}
</style>
@stop

<!-- Content -->
@section('content')
<div class="container text-center">
  <div class="row gy-5 my-5 mx-5">
    <div class="col-6">
      <div class="p-3 border border-dark fw-bold" id="floatingInput">Total Users: {{ $account['total-accounts'] }} <label for="floatingInput"></label></div>
    </div>
    <div class="col-6">
      <div class="p-3 border border-dark fw-bold" id="floatingInput">Police Accounts: {{ $account['police-accounts'] }}<label for="floatingInput"></label></div>
    </div>
    <div class="col-6">
      <div class="p-3 border border-dark fw-bold" id="floatingInput">Barangay VAW Desk: {{ $account['vaw-accounts'] }}<label for="floatingInput"></label></div>
    </div>
    <div class="col-6">
      <div class="p-3 border border-dark fw-bold" id="floatingInput">User Victims: {{ $account['user-victims'] }} <label for="floatingInput"></label></div>
    </div>
  </div>
</div>
@stop

<!-- Scripts -->
@section('scripts')

@stop
