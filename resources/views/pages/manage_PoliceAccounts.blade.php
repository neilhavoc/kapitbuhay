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

                        <tr>
                            <td> 001</td>
                            <td>{{ $account['fName'] }} {{ $account['lName'] }}</td>
                            <td>{{ $account['street'] }} {{ $account['barangay'] }} {{ $account['city'] }}</td>
                            <td>{{ $account['email'] }}</td>
                            <td>{{ $account['phonenumber'] }}</td>
                            <td>
                                <!-- Modal trigger button -->
                                <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#viewPolice">
                                    View
                                </button>
                            </td>

                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        {{-- view modal --}}
        <div class="modal fade" id="viewPolice" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                    <img src="ball.jpg" alt="Ball" class="profile">

                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <h5 class="col-md-2">User ID: </h5>
                                        <h5 id="userID" class="col-md-4">sample</h5>
                                    </div>
                                    <div class="row mt-1">
                                        <h5 class="col-md-4">Police Station Name:</h5>
                                        <input type="text" class="col-md-4">
                                    </div>
                                    <div class="row mt-1">
                                        <h5 class="col-md-4">Contact No:</h5>
                                        <input type="text" class="col-md-4">
                                    </div>
                                    <div class="row mt-1">
                                        <h5 class="col-md-4">Email:</h5>
                                        <input type="text" class="col-md-4">
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
                                            <input type="text" class="col-md-3">
                                            <h5 class="col-md-2">
                                                Barangay:
                                            </h5>
                                            <input type="text" class="col-md-3">
                                    </div>
                                    <div class="row mt-2">
                                        <h5 class="col-md-2">
                                            Purok:
                                        </h5>
                                        <input type="text" class="col-md-6">
                                    </div>
                                    <div class="row mt-2">
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
                                        <img src="ball.jpg" alt="Ball" class="profile">
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
                                <div class="row mt-4">
                                    <div class="col-md-2">
                                        <h5>
                                            Account Status:
                                        </h5>
                                    </div>
                                    <div class="col-md-5">

                                        <div class="dropdown">
                                            <select class="form-select" id="Account Status" aria-label="Account selection">
                                                <option selected disabled>Select One</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                              </select>
                                        </div>

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
        {{-- picture modal --}}
        <div class="modal fade" id="picmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="ball.jpg" alt="Ball" class="modal-profile">
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

<!-- Scripts -->
@section('scripts')
<script>
    document.addEventListener("click", function(e){
       if(e.target.classList.contains("profile")){
        const src = e.target.getAttribute("src");
        document.querySelector(".modal-profile").src = src;
        const myModal = new bootstrap.Modal(document.getElementById('picmodal'));
        myModal.show();
       }
    })
</script>
@stop
