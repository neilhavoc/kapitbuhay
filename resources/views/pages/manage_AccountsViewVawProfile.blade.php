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
<div class="container-fluid" style="overflow-y: scroll; overflow-x: hidden; height:600px;">
    <div style="text-align:center">
        <h1>
            View Police Profile
        </h1>
    </div>
    <div class="row mx-3" style="height: 100vh;">
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
                    <input type="text" disabled ="true" class="col-md-4" value="{{ $item['brgyName'] }}">
                </div>
                <div class="row mt-1 ms-3">
                    <h5 class="col-md-4">Contact No:</h5>
                    <input type="text" disabled ="true" class="col-md-4" value="{{ $item['brgyContactNum1'] }}">
                </div>
                <div class="row mt-1 ms-3">
                    <h5 class="col-md-4">Email:</h5>
                    <input type="text" disabled ="true" class="col-md-4" value="{{ $item['brgyEmail'] }}">
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
                    <input type="text" disabled ="true" class="col-md-3" value="{{ $item['brgycity'] }}">
                    <h5 class="col-md-2">
                        Barangay:
                    </h5>
                    <input type="text" disabled ="true" class="col-md-3" value="{{ $item['barangay'] }}">
                </div>

                <div class="row mt-1">
                    <h5 class="col-md-2">
                       Purok/Street:
                    </h5>
                    <input type="text" disabled ="true" class="col-md-6" value="{{$item['brgyStreet'] }}" >
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
                    <select class="form-select" name="verification" id="verification" aria-label="verification selection" required>
                        <option selected disabled>{{ $item['verification_status'] }}</option>
                        <option value="Verified">Verified</option>
                        <option value="To Verify">To Verify</option>
                        <option value="Verification Failed">Verification Failed</option>
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
                    <select class="form-select" name="accountStatus" id="AccountStatus" aria-label="verification selection" required>
                        <option selected disabled>{{ $item['account_status'] }}</option>
                        <option value="Not Banned">Not Banned</option>
                        <option value="Banned">Banned</option>
                        <option value="Warning">Warning</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

<!-- Scripts -->
@section('scripts')
<script>
</script>
@stop
