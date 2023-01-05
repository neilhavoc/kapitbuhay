@extends('layouts.manage_accounts')

<!-- Page Title -->
@section('title', 'Title')

<!-- Styles -->
@section('styles')
<style>

.profile{
    height: 170x;
    width: 200px;
}
.head-credential{
    font-size: 12px;
}
.modal-footer-text-center{
    text-align: center;
    padding-bottom: 50px;
}
.modal-profile
{
    width: 100%;
}
</style>

@stop

<!-- Content -->
@section('content')
    <div class="container search"  style="overflow: hidden; overflow-y: scroll;">
        <div class="row">
            <div class="col-md-5">
                <input class= "container-fluid h-100" type="text" placeholder="Search">
            </div>
        </div>
        <div class="form-group mt-3">
            <table class="table table-hover table-bordered text-center">
                <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd-1" class="col-lg-1">ID</th>
                        <th id="trs-hd-2" class="col-lg-3">Police Station Name</th>
                        <th id="trs-hd-3" class="col-lg-3">Police Officer FullName</th>
                        <th id="trs-hd-3" class="col-lg-3">Email</th>
                        <th id="trs-hd-2" class="col-lg-2">Contact</th>
                        <th id="trs-hd-2" class="col-lg-2">Account Status</th>
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
                            <tr>
                                <td>{{ $item->id() }}</td>
                                <td>{{ $item['policeName'] }}</td>
                                <td>{{ $item['policeStreet'] }} {{ $item['barangay'] }} {{ $item['policecity'] }}</td>
                                <td>{{ $item['policeEmail'] }}</td>
                                <td>{{ $item['policeContactNum1'] }}</td>
                                <td>
                                    <form action="policeAcc" method="POST">
                                        @csrf
                                        <input type="text" hidden="true" name="policeID" class="col-md-3" value="{{ $item->id() }}">
                                        <button class="btn btn-warning" type="submit">
                                            View
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@stop

<!-- Scripts -->
@section('scripts')
<script>
</script>
@stop
