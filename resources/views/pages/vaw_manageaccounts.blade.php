@extends('layouts.Vaw')

<!-- Page Title -->
@section('title', 'Title')

<!-- Styles -->
@section('styles')
<style>
    .profile{
    height: 170x;
    width: 200px;

}
.footer{
    margin-left: 380px;
}
</style>
@stop

<!-- Content -->
@section('content')
<div class="container-fluid" style="overflow-y: scroll; overflow-x: hidden; height:560px;">
    <div class="position-relative" style="text-align:center">
      <h1 class=""> Manage Account</h1>
    </div>
    <div class="row mb-5 row1 " style="margin-top:5%">
        <div class="col-md-7" style="text-align:center">
            <img src="{{ $account['brgyLogo'] }}" alt="Ball" class="profile">
        </div>
        <div class="row mt-2 invisible">
            <h5 class="col-md-2">User ID: </h5>
            <h5 id="userID" class="col-md-4">{{ $account->id() }}</h5>
        </div>
        <div class="row mt-2">
            <h5 class="col-md-2">Barangay Name:</h5>
            <input type="text" class="col-md-5" value="{{ $account['brgyName'] }}" disabled>
        </div>
        <div class="row mt-2">
            <h5 class="col-md-2">VAW Staff Name:</h5>
            <input type="text" class="col-md-5" value="{{ $account['brgyStaffFullName'] }}" disabled>
        </div>
        <div class="row mt-2">
            <h5 class="col-md-2">VAW Staff Position:</h5>
            <input type="text" class="col-md-5" value="{{ $account['brgyStaffPosition'] }}" disabled>
        </div>
        <div class="row mt-2">
            <h5 class="col-md-2">Contact No:</h5>
            <input type="text" class="col-md-5" value="{{ $account['brgyContactNum'] }}" disabled>
        </div>
        <div class="row mt-2">
            <h5 class="col-md-2">Street:</h5>
            <input type="text" class="col-md-5" value="{{ $account['brgyStreet'] }}" disabled>
        </div>
        <div class="row mt-2">
            <h5 class="col-md-2">Brgy & City:</h5>
            <input type="text" class="col-md-5" value="{{ $account['barangay'] }}, {{ $account['brgycity'] }}" disabled>
        </div>
        <div class="row mt-2">
            <h5 class="col-md-2">Email:</h5>
            <input type="text" class="col-md-5" value="{{ $account['brgyEmail'] }}" disabled>
        </div>
        <form action="vaw_manageaccount" method="POST">
            @csrf
            <div class="row mt-2">
                <h5 class="col-md-2">Password:</h5>
                <input type="password" name="password" class="col-md-5">
                @if ($password == 'true')
                    <span id="passwordHelpInline" class="form-text" style="color:red">
                        Password does not match
                    </span>
                @elseif ($notStrong == 'true')
                    <span id="passwordHelpInline" class="form-text" style="color:red">
                        Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.
                    </span>
                @endif
            </div>
            <div class="row mt-2 mb-3">
                <h5 class="col-md-2">Confirm password:</h5>
                <input type="password" name="conpassword" class="col-md-5">
                @if ($password == 'true')
                    <span id="passwordHelpInline" class="form-text" style="color:red">
                        Password does not match
                    </span>
                @else
                @endif
            </div>
            <div class="footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@stop

<!-- Scripts -->
@section('scripts')

@stop
