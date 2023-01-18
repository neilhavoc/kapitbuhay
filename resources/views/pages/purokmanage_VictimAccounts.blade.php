@extends('layouts.PurokLeader')

<!-- Page Title -->
@section('title', 'Title')

<!-- Styles -->
@section('styles')
<style>
.profile{
    height: 170x;
    width: 200px;
}
.credential{
    height: 150px;
    width: 50px;
}
.head-credential{
    font-size: 12px;
}
.modal-footer-text-center {
    text-align: center;
    margin-bottom: 1%;
}
</style>
@stop

<!-- Content -->
@section('content')

    <div class="container search" style="overflow: hidden; overflow-y: scroll;">
        <div class="row">
        </div>
        <div class="form-group mt-3">
            <table class="table table-hover table-bordered text-center">
                <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd-1" class="col-lg-1">ID</th>
                        <th id="trs-hd-2" class="col-lg-3">Victim Name</th>
                        <th id="trs-hd-3" class="col-lg-3">Address</th>
                        <th id="trs-hd-4" class="col-lg-3">Email</th>
                        <th id="trs-hd-4" class="col-lg-2">Contact</th>
                        <th id="trs-hd-4" class="col-lg-2">Strike Status</th>
                        <th id="trs-hd-4" class="col-lg-2">Account Status</th>
                        <th id="trs-hd-4" class="col-lg-2">Verification Status</th>
                        <th id="trs-hd-4" class="col-lg-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($account == null)
                        <tr>
                            <td class="text-center" colspan="3">No Data!</td>
                        </tr>
                    @else
                        @foreach ($account as $item)
                            @if ($item['barangay'] == 'Mabolo')
                                @if ($item['purok'] == 'Purok 1')
                                    <tr>
                                        <td>{{ $item->id() }}</td>
                                        <td>{{ $item['fName'] }} {{ $item['lName'] }}</td>
                                        <td>{{ $item['purok'] }} {{ $item['street'] }} {{ $item['barangay'] }} {{ $item['city'] }}</td>
                                        <td>{{ $item['email'] }}</td>
                                        <td>{{ $item['phonenumber'] }}</td>
                                        <td>{{ $item['strike'] }}</td>
                                        <td>{{ $item['account_status'] }}</td>
                                        <td>{{ $item['purok_verification'] }}</td>
                                        <td>
                                            <form action="purokmanage_VicAcc" method="POST">
                                                @csrf
                                                <input type="text" hidden="true" name="victimID" class="col-md-3" value="{{ $item->id() }}">
                                                <button class="btn btn-warning" type="submit">
                                                    View
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
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
