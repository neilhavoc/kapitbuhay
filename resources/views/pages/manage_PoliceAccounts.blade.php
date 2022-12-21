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
                        <th id="trs-hd-2" class="col-lg-3">Police Station Name</th>
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
                                <td>{{ $item['policeName'] }}</td>
                                <td>{{ $item['policeStreet'] }} {{ $item['barangay'] }} {{ $item['policecity'] }}</td>
                                <td>{{ $item['policeEmail'] }}</td>
                                <td>{{ $item['policeContactNum1'] }}</td>
                                <td>
                                    <!-- Modal trigger button -->
                                    <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#viewPolice{{ $item->id() }}">
                                        View
                                    </button>
                                </td>

                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        {{-- view modal --}}
        @if ($account == null)
        @else
            @foreach ($account as $item)
            <form action="policeAcc/{{ $item->id() }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal fade" id="viewPolice{{ $item->id() }}" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                                <h5 class="modal-title position-absolute top-25 start-50 translate-middle" id="staticBackdropLabel">View Police Profile</h5>
                            </div>
                            <div class="modal-body">
                                <div class="container border-secondary" style="height:400px; margin-top:0%; margin-bottom:0%;">
                                    <div class="row mb-3 row1">
                                        <div class="col-md-2 mx-5">
                                            <img src="{{ $item['policeLogo'] }}" alt="Ball" class="profile">

                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <h5 class="col-md-2">User ID: </h5>
                                                <h5 id="userID" class="col-md-4">{{ $item->id() }}</h5>
                                            </div>
                                            <div class="row mt-1">
                                                <h5 class="col-md-4">Police Station Name:</h5>
                                                <input type="text" disabled ="true" class="col-md-4" value="{{ $item['policeName'] }}">
                                            </div>
                                            <div class="row mt-1">
                                                <h5 class="col-md-4">Contact No:</h5>
                                                <input type="text" disabled ="true" class="col-md-4" value="{{ $item['policeContactNum1'] }}">
                                            </div>
                                            <div class="row mt-1">
                                                <h5 class="col-md-4">Email:</h5>
                                                <input type="text" disabled ="true" class="col-md-4" value="{{ $item['policeEmail'] }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3 row2">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h1 class="fw-heavy">
                                                        Address:
                                                    </h1>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                    <h5 class="col-md-2">
                                                        City:
                                                    </h5>
                                                    <input type="text" disabled ="true" class="col-md-3" value="{{ $item['policecity'] }}">
                                                    <h5 class="col-md-2">
                                                        Barangay:
                                                    </h5>
                                                    <input type="text" disabled ="true" class="col-md-3" value="{{ $item['barangay'] }}">
                                            </div>
                                            <div class="row mt-2">
                                                <h5 class="col-md-2">
                                                    Purok:
                                                </h5>
                                                <input type="text" disabled ="true" class="col-md-3" value="{{ $item['policePurok'] }}">
                                            </div>
                                            <div class="row mt-2">
                                                <h5 class="col-md-2">
                                                    Street:
                                                </h5>
                                                <input type="text" disabled ="true" class="col-md-3" value="{{ $item['policeStreet'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <h2 class="fw-light head-credential">
                                                    Photo of Valid Credentials:
                                                </h2>
                                            </div>
                                            <div class="row">
                                                <img src="{{ $item['policeValidIDFront'] }}" alt="BrgyValidIDFront" class="credential col-md-6">
                                                <img src="{{ $item['policeValidIDBack'] }}" alt="BrgyValidIDBack  " class="credential col-md-6">
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
                            <div class="modal-footer-text-center">
                                <hr class="mt-5">
                                <button style="width: 100px;">
                                    Update
                                </button>
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
<script>
</script>
@stop
