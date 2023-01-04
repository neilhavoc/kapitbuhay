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
                    <img src="{{ $vaw['brgyLogo'] }}" alt="brgyLogo" class="profile">
                </div>
                <div class="col-md-8">
                    <div class="row ms-3">
                        <h5 class="col-md-2">User ID: </h5>
                        <h5 id="userID" class="col-md-4">{{ $vaw->id() }}</h5>
                    </div>
                    <div class="row mt-1 ms-3">
                        <h5 class="col-md-2">Barangay Name:</h5>
                        <input type="text" disabled ="true" class="col-md-4" value="{{ $vaw['brgyName'] }}">
                    </div>
                    <div class="row mt-1 ms-3">
                        <h5 class="col-md-2">Contact No:</h5>
                        <input type="text" disabled ="true" class="col-md-4" value="{{ $vaw['brgyContactNum1'] }}">
                    </div>
                    <div class="row mt-1 ms-3">
                        <h5 class="col-md-2">Email:</h5>
                        <input type="text" disabled ="true" class="col-md-4" value="{{ $vaw['brgyEmail'] }}">
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
                        Purok/Street:
                        </h5>
                        <input type="text" disabled ="true" class="col-md-3" value="{{$vaw['brgyStreet'] }}" >
                    </div>
                    <div class="row mt-1">
                        <h5 class="col-md-2">
                            Barangay:
                        </h5>
                        <input type="text" disabled ="true" class="col-md-3" value="{{ $vaw['barangay'] }}">
                    </div>
                    <div class="row mt-1">
                        <h5 class="col-md-2">
                            City:
                        </h5>
                        <input type="text" disabled ="true" class="col-md-3" value="{{ $vaw['brgycity'] }}">
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="row">
                        <h2 class="fw-light head-credential">
                            Photo of Valid Credentials:
                        </h2>
                    </div>
                    <div class="row">
                        <img src="{{ $vaw['brgyValidIDFront'] }}" alt="BrgyValidIDFront" class="credential col-md-6">
                        <img src="{{ $vaw['brgyValidIDBack'] }}" alt="BrgyValidIDBack  " class="credential col-md-6">
                    </div>
                </div>
            </div>
            <div class="row row3">
                <form action="manage_accountsvawprofileview/{{ $vaw->id() }}" method="POST">
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
                                <option value="{{ $vaw['verification_status'] }}">{{ $vaw['verification_status'] }}</option>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <button type="submit" class="btn btn-info" disabled>Update Verification</button>
                        </div>
                        @else
                        <div class="col-md-5">
                            <select class="form-select" name="verification" aria-label="verification selection">
                                <option value="{{ $vaw['verification_status'] }}">{{ $vaw['verification_status'] }}</option>
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
                <form action="manage_accountspoliceprofileview/updateAccStatus/{{ $vaw->id() }}" method="POST">
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
                                <option selected disabled>{{ $vaw['account_status'] }}</option>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <button type="submit" class="btn btn-info" disabled>Update Account Status</button>
                        </div>
                        @else
                        <div class="col-md-5">
                            <select class="form-select" name="AccountStatus" id="AccountStatus" aria-label="verification selection">
                                <option selected disabled>{{ $vaw['account_status'] }}</option>
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
        </div>
    </div>
</form>
@stop

<!-- Scripts -->
@section('scripts')
<script>
</script>
@stop
