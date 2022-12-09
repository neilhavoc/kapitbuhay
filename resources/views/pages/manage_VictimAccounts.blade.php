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

    <div class="container search">
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
                        <th id="trs-hd-2" class="col-lg-3">Victim Name</th>
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
                            <td>{{ $item['fName'] }} {{ $item['lName'] }}</td>
                            <td>{{ $item['street'] }} {{ $item['barangay'] }} {{ $item['city'] }}</td>
                            <td>{{ $item['email'] }}</td>
                            <td>{{ $item['phonenumber'] }}</td>
                            <td>
                                <!-- Modal trigger button -->
                                <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#viewVictim{{ $item->id() }}">
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
                <div class="modal fade" id="viewVictim{{ $item->id() }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen">
                        <form action="VictimAcc/{{ $item->id() }}" method="GET">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                                    <h5 class="modal-title position-absolute top-25 start-50 translate-middle" id="staticBackdropLabel">View Victim's Profile</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="container border-secondary" style=" margin-top:0%; margin-bottom:0%;">
                                        <div class="row row1 mt-3">
                                            <div class="col-md-2">
                                                <img src="ball.jpg" alt="Ball" class="profile">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="row mx-3">
                                                    <h5 class="col-md-2">User ID: </h5>
                                                    <h5 id="userID" class="col-md-4">{{ $item->id() }}</h5>
                                                </div>
                                                <div class="row mt-1 mx-3">
                                                    <h5 class="col-md-4">Name:</h5>
                                                    <input type="text" class="col-md-4" value="{{ $item['fName'] }}">
                                                </div>
                                                <div class="row mt-1 mx-3">
                                                    <h5 class="col-md-4">Contact No:</h5>
                                                    <input type="text" class="col-md-4" value="{{ $item['lName'] }}">
                                                </div>
                                                <div class="row mt-1 mx-3">
                                                    <h5 class="col-md-4">Email:</h5>
                                                    <input type="text" class="col-md-4" value="{{ $item['email'] }}">
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
                                                            City:
                                                        </h5>
                                                        <input type="text" class="col-md-3" value="{{ $item['city'] }}">
                                                        <h5 class="col-md-2">
                                                            Barangay:
                                                        </h5>
                                                        <input type="text" class="col-md-3" value="{{ $item['barangay'] }}">
                                                </div>
                                                <div class="row mt-1">
                                                    <h5 class="col-md-2">
                                                        Street:
                                                    </h5>
                                                    <input type="text" class="col-md-6" value="{{ $item['street'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <h2 class="fw-light head-credential">
                                                        Valid ID:
                                                    </h2>
                                                </div>
                                                <div class="row">
                                                    <img src="{{ $item['id_picture_link'] }}" alt="Ball" class="credential col-md-6">
                                                    <img src="{{ $item['selfie_picture_link'] }}" alt="Ball" class="credential col-md-6">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row3 mt-5">
                                            <div class="col-md-8">
                                                <div class="row">
                                                <div class="col-md-2">
                                                    <h5>
                                                        Verification Status:
                                                    </h5>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Dropdown button
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="row mt-3">
                                                <div class="col-md-2">
                                                    <h5>
                                                        Account Status:
                                                    </h5>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Dropdown button
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <h5 class="col-md-3">ID Type: </h5>
                                                    <h5 id="IDtype" class="col-md-4">sample</h5>
                                                </div>
                                                <div class="row mt-3">
                                                    <h5 class="col-md-4">ID Number: </h5>
                                                    <h5 id="IDtype" class="col-md-4">sample</h5>
                                                </div>
                                                <div class="row mt-3">
                                                    <h5 class="col-md-4">Expire Date: </h5>
                                                    <h5 id="IDtype" class="col-md-4">sample</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer-text-center">
                                    <hr class="fw-heavy">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

@stop

<!-- Scripts -->
@section('scripts')

@stop
