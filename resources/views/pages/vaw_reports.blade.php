@extends('layouts.Vaw')

<!-- Page Title -->
@section('title', 'Title')

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
<div class="container text-center" style="overflow-y: scroll; overflow-x: hidden; height:560px;">
    <div class="row mt-5" >
        <div class="row justify-content-center mt-2">
            <div class="rounded-circle bg-danger text-light h1" style="height: 50px; width: 50px;">
                4
            </div>
        </div>
        <div class="row justify-content-center ">
            <div class="col-auto text-dark h4">
                Total Open Cases
            </div>
        </div>
    </div>
    <div class="row gy-5 my-5 mx-5">
      <div class="col-6">
        <canvas id="totalcases" style="width:100%"></canvas>
      </div>
      <div class="col-6">
        <canvas id="totalclosedcased" style="width:50%;max-width:600px;"></canvas>
      </div>
    </div>


  </div>
@stop

<!-- Scripts -->
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script>
    var xValues = ["January", "February", "March", "April", "May", "July"];
var yValues = [10, 5, 3, 4, 8, 12];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145",
  "#2f7965"
];

new Chart("totalcases", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
        label: 'Total Closed Cases',
        backgroundColor: barColors,
        data: yValues
    }]
  }
});
new Chart("totalclosedcased", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
        label: 'Total Cases',
        backgroundColor: barColors,
        data: yValues
    }]
  }
});
</script>
@stop
