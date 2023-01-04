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
            <div class="row row1 mt-3">
                <div class="col-md-2">
                    <img src="{{ $victim['profile_image_link'] }}" alt="Ball" class="profile">
                </div>
                <div class="col-md-8">
                    <div class="row mx-3">
                        <h5 class="col-md-2">User ID: </h5>
                        <h5 id="userID" class="col-md-4">{{ $victim->id() }}</h5>
                    </div>
                    <div class="row mt-1 mx-3">
                        <h5 class="col-md-2">Name:</h5>
                        <input type="text" disabled ="true" class="col-md-4" value="{{ $victim['fName'] }} {{ $victim['lName'] }}">
                    </div>
                    <div class="row mt-1 mx-3">
                        <h5 class="col-md-2">Contact No:</h5>
                        <input type="text" disabled ="true" class="col-md-4" value="{{ $victim['phonenumber'] }}">
                    </div>
                    <div class="row mt-1 mx-3">
                        <h5 class="col-md-2">Email:</h5>
                        <input type="text" disabled ="true" class="col-md-4" value="{{ $victim['email'] }}">
                    </div>
                </div>
            </div>
            <div class="row row2 mt-3">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="fw-heavy">
                                Address:
                            </h1>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <h5 class="col-md-2">
                            Street:
                        </h5>
                        <input type="text" disabled ="true" class="col-md-3" value="{{ $victim['street'] }}">
                    </div>
                    <div class="row mt-1">
                        <h5 class="col-md-2">
                            Barangay:
                        </h5>
                        <input type="text" disabled ="true" class="col-md-3" value="{{ $victim['barangay'] }}">
                    </div>
                    <div class="row mt-1">
                        <h5 class="col-md-2">
                            City:
                        </h5>
                        <input type="text" name='city' disabled ="true" class="col-md-3" value="{{ $victim['city'] }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <h2 class="fw-light head-credential">
                            Valid ID:
                        </h2>
                    </div>
                    <div class="row">
                        <img src="{{ $victim['id_picture_link'] }}" alt="Ball" class="credential col-md-6">
                        <img src="{{ $victim['selfie_picture_link'] }}" alt="Ball" class="credential col-md-6">
                    </div>
                </div>
            </div>
            <div class="row row3 mt-5">
                <div class="col-md-8">
                    <form action="manage_accountsvictimprofileview/{{ $victim->id() }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-md-2">
                                <h5>
                                    Verification Status:
                                </h5>
                            </div>
                            @if($verifydisable == 'disabled')
                            <div class="col-md-5">
                                <select class="form-select" name="verification" aria-label="verification selection" disabled>
                                    <option value="{{ $victim['verification_status'] }}">{{ $victim['verification_status'] }}</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <button type="submit" class="btn btn-info" disabled>Update Verification</button>
                            </div>
                            @else
                            <div class="col-md-5">
                                <select class="form-select" name="verification" aria-label="verification selection">
                                    <option value="{{ $victim['verification_status'] }}">{{ $victim['verification_status'] }}</option>
                                    <option value="Verified">Verified</option>
                                    <option value="To Verify">To Verify</option>
                                    <option value="Verification Failed">Verification Failed</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <button type="submit" class="btn btn-info">Update Verification</button>
                            </div>
                            @endif
                        </div>
                    </form>
                    <form action="manage_accountsvictimprofileview/updateAccStatus/{{ $victim->id() }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mt-3">
                            <div class="col-md-2">
                                <h5>
                                    Account Status:
                                </h5>
                            </div>
                            @if($disable == 'disabled')
                            <div class="col-md-5">
                                <select class="form-select" name="AccountStatus" id="AccountStatus" aria-label="verification selection" disabled>
                                    <option selected disabled>{{ $victim['account_status'] }}</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <button type="submit" class="btn btn-info" disabled>Update Account Status</button>
                            </div>
                            @else
                            <div class="col-md-5">
                                <select class="form-select" name="AccountStatus" id="AccountStatus" aria-label="verification selection">
                                    <option selected disabled>{{ $victim['account_status'] }}</option>
                                    <option value="Not Banned">Not Banned</option>
                                    <option value="Banned">Banned</option>
                                    <option value="Warning">Warning</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <button type="submit" class="btn btn-info">Update Account Status</button>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <h5 class="col-md-3">ID Type: </h5>
                        <h5 id="IDtype" class="col-md-4">{{ $victim['ID_Type'] }}</h5>
                    </div>
                    <div class="row mt-3">
                        <h5 class="col-md-4">ID Number: </h5>
                        <h5 id="IDtype" class="col-md-4">{{ $victim['ID_Number'] }}</h5>
                    </div>
                    <div class="row mt-3">
                        <h5 class="col-md-4">Expire Date: </h5>
                        <h5 id="IDtype" class="col-md-4">{{ $victim['ID_ExpiryDate'] }}</h5>
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
