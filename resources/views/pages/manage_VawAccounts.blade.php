@extends('layouts.manage_accounts')

<!-- Page Title -->
@section('title', 'Title')

<!-- Styles -->
@section('styles')
<style>
.profile{
    height: 200px;
    width: 200px;
}
.credential{
    height: 200px;
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
        <div class="col-md-5">
            <input class= "container-fluid h-100" type="text" placeholder="Search">
        </div>
    </div>
    <div class="form-group mt-3">
        <table class="table table-hover table-bordered text-center">
            <thead class="bill-header cs">
                <tr>
                    <th id="trs-hd-1" class="col-lg-1">ID</th>
                    <th id="trs-hd-2" class="col-lg-3">VAW Station Name</th>
                    <th id="trs-hd-3" class="col-lg-3">Address</th>
                    <th id="trs-hd-4" class="col-lg-3">Email</th>
                    <th id="trs-hd-4" class="col-lg-2">Contact</th>
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
                        <td>{{ $item['brgyName'] }}</td>
                        <td>{{ $item['barangay'] }} {{ $item['brgycity'] }} {{ $item['brgyProvince'] }}</td>
                        <td>{{ $item['brgyEmail'] }}</td>
                        <td>{{ $item['brgyContactNum1'] }}</td>
                        <td>
                            <!-- Modal trigger button -->
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#VawAcc{{ $item->id() }}">
                                View
                            </button>
                        </td>

                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    @if ($account == null)
    @else
        @foreach ($account as $item)
        <form action="VawAcc/{{ $item->id() }}" method="GET">
            @csrf
            <div class="modal fade" id="VawAcc{{ $item->id() }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                                <h5 class="modal-title position-absolute top-25 start-50 translate-middle" id="staticBackdropLabel">View VAW's Profile</h5>
                            </div>
                            <div class="modal-body">
                                <div class="container border-secondary" style="height:400px; margin-top:0%; margin-bottom:0%;">
                                    <div class="row row1">
                                        <div class="col-md-2">
                                            <img src="{{ $item['brgyLogo'] }}" alt="brgyLogo" class="profile">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row ms-3">
                                                <h5 class="col-md-2">User ID: </h5>
                                                <h5 id="userID" class="col-md-4">{{ $item->id() }}</h5>
                                            </div>
                                            <div class="row mt-1 ms-3">
                                                <h5 class="col-md-4">Barangay Name:</h5>
                                                <input type="text" class="col-md-4">
                                            </div>
                                            <div class="row mt-1 ms-3">
                                                <h5 class="col-md-4">Contact No:</h5>
                                                <input type="text" class="col-md-4">
                                            </div>
                                            <div class="row mt-1 ms-3">
                                                <h5 class="col-md-4">Email:</h5>
                                                <input type="text" class="col-md-4">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row2">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h1 class="fw-heavy">
                                                        Address:
                                                    </h1>
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <h5 class="col-md-2">
                                                    City:
                                                </h5>
                                                <input type="text" class="col-md-3">
                                                <h5 class="col-md-2">
                                                    Barangay:
                                                </h5>
                                                <input type="text" class="col-md-3">
                                            </div>
                                            <div class="row mt-1">
                                                <h5 class="col-md-2">
                                                    Purok:
                                                </h5>
                                                <input type="text" class="col-md-6">
                                            </div>
                                            <div class="row mt-1">
                                                <h5 class="col-md-2">
                                                    Street:
                                                </h5>
                                                <input type="text" class="col-md-6">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <h2 class="fw-light head-credential">
                                                    Photo of Valid Credentials:
                                                </h2>
                                            </div>
                                            <div class="row">
                                                <img src="{{ $item['brgyValidIDFront'] }}" alt="BrgyValidIDFront" class="credential col-md-6">
                                                <img src="{{ $item['brgyValidIDBack'] }}" alt="BrgyValidIDBack  " class="credential col-md-6">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row3">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <h5>
                                                    Verification Status:
                                                </h5>
                                            </div>
                                            <div class="col-md-5">
                                                <select class="form-select" id="verification" aria-label="verification selection">
                                                    <option selected disabled>Select One</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row4 mt-5">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <h5>
                                                    Account Status:
                                                </h5>
                                            </div>
                                            <div class="col-md-5">
                                                <select class="form-select" id="AccountStatus" aria-label="verification selection">
                                                    <option selected disabled>Select One</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer-text-center fixed-bottom">
                                    <button type="button" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endforeach
    @endif
</div>
@stop

<!-- Scripts -->
@section('scripts')

@stop
