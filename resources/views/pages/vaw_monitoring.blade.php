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
    <form action="vaw_monitoring/displaySpecific" method="POST">
        @csrf
        <div class="row g-1 mb-5">
            <div class="col-md-2">
                <select class="form-select" name="sortby" id="sortby" aria-label="Sort By" required>
                    <option selected disabled">Sort by</option>
                    <option value="Not Yet Monitored">Not Yet Monitored</option>
                    <option value="Monitored">Monitored</option>
                </select>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>
        <div class="form-group mt-0">
            <table class="table table-hover table-bordered text-center">
                <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd-2" class="col-lg-2">Name</th>
                        <th id="trs-hd-3" class="col-lg-4">Address</th>
                        <th id="trs-hd-5" class="col-lg-2">Contact No.</th>
                        <th id="trs-hd-6" class="col-lg-2">Monitoring Status</th>
                        <th id="trs-hd-7" class="col-lg-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($reports == null)
                        <tr class="justify-contents-center ">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @else
                        @foreach ($reports as $item)
                            @if ($isSearched == 'empty')
                                <tr class="justify-contents-center ">
                                    <td>{{ $item['victimFullName'] }}</td>
                                    <td>{{ $item['victimAddress'] }}</td>
                                    <td>{{ $item['victimPhoneNum'] }}</td>
                                    <td>{{ $item['monitoring_status'] }}</td>
                                    <td>
                                        <form action="vaw_monitoring" method="POST">
                                            @csrf
                                            <input type="text" hidden="true" name="monitoringID" class="col-md-3" value="{{ $item->id() }}">
                                            <button type="submit" class="btn btn-warning"> Update </button>
                                        </form>
                                    </td>

                                </tr>
                            @elseif ($isSearched == $item['monitoring_status'])
                                <tr class="justify-contents-center ">
                                    <td>{{ $item['victimFullName'] }}</td>
                                    <td>{{ $item['victimAddress'] }}</td>
                                    <td>{{ $item['victimPhoneNum'] }}</td>
                                    <td>{{ $item['monitoring_status'] }}</td>
                                    <td>
                                        <form action="vaw_monitoring" method="POST">
                                            @csrf
                                            <input type="text" hidden="true" name="monitoringID" class="col-md-3" value="{{ $item->id() }}">
                                            <button type="submit" class="btn btn-warning"> Update </button>
                                        </form>
                                    </td>

                                </tr>
                            @endif
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
</div>
@stop

<!-- Scripts -->
@section('scripts')

@stop
