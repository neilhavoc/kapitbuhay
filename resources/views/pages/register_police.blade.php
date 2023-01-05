<!DOCTYPE html>
<html>
    <head>


    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>KapitBuhay - Register Police</title>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    </head>

    </head>

    <body>
        <h1 class="text-center mb-5">Create New Account for Police Account</h1>
        <form action="register_police" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($notEqual == 'true')
                <div class="container border-secondary">
                    <div class="row mb-3">
                        <div class="col-auto">
                            <label for="PS_name" class="col-form-label">Police Station Name:</label>
                        </div>
                        <div class="col-auto "><input name="policeStationName" id="PS_name" type="text" class="form-control align-content-center w-100" value="{{$input['policeName']}}" required></div>
                    </div>
                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-auto">
                        <label for="cn1" class="col-form-label">Police Station Jurisdiction:</label>
                        </div>
                        <div class="col-auto">
                        <input type="text" name="policejurisdiction" id="cn1" class="form-control" value="{{$input['policeJurisdiction']}}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-auto">
                            <label for="PO_name" class="col-form-label">Police Officer Name:</label>
                        </div>
                        <div class="col-auto ">
                            <input name="policeOfficerName" id="PO_name" type="text" class="form-control align-content-center w-100" value="{{$input['policeOfficerName']}}" required>
                            @if ($namefound == 'true')
                                <span id="passwordHelpInline" class="form-text" style="color:red">
                                    Name is already in the Database
                                </span>
                            @else
                            @endif
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-auto">
                        <label for="cn1" class="col-form-label">Police Officer Position:</label>
                        </div>
                        <div class="col-auto">
                        <input type="text" name="policePosition" id="cn1" class="form-control" value="{{$input['policePosition']}}" required>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mb-5">
                        <div class="col-auto">
                        <label for="cn1" class="col-form-label">Police Officer Contact number:</label>
                        </div>
                        <div class="col-auto">
                        <input type="text" name="policeContact" id="cn1" class="form-control" value="{{$input['policeContact']}}" required>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-auto">Address</div>
                        <div class="col-auto">
                            <select class="form-select" name="province" id="province" aria-label="province selection" required>
                                <option value="{{$input['policeProvince']}}">{{$input['policeProvince']}}</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <select class="form-select" name="city" id="City" aria-label="city selection" required>
                                <option value="{{$input['policecity']}}">{{$input['policecity']}}</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <select class="form-select" name="barangay" id="barangay" aria-label="barangay selection" required>
                                <option value="{{$input['barangay']}}">{{$input['barangay']}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2 ">
                        <div class="col-auto">
                            <label for="purok" class="col-form-label">Purok:</label>
                        </div>
                        <div class="col-auto">
                            <input name="purok" id="purok" type="text" class="form-control align-content-center w-100" value="{{$input['policePurok']}}" required>
                        </div>
                    </div>
                    <div class="row mt-2 ">
                        <div class="col-auto">
                            <label for="street" class="col-form-label">Street:</label>
                        </div>
                        <div class="col-md-auto">
                            <input name="street" id="street" type="text" class="form-control align-content-center w-100" value="{{$input['policeStreet']}}" required>
                        </div>
                    </div>
                    <div class="row mt-2 ">
                        <div class="col-auto">
                            <label for="zip" class="col-form-label">Zipcode:</label>
                        </div>
                        <div class="col-auto">
                            <input name="zipcode" id="zip" type="text" class="form-control align-content-center w-100" value="{{$input['policeZipCode']}}" required>
                        </div>
                    </div>
                    <div class="row mt-2 ">
                        <div class="col-auto">
                            <label for="email" class="col-form-label">Email:</label>
                        </div>
                        <div class="col-md-auto">
                            <input name="email" id="email" type="text" class="form-control align-content-center w-100" value="{{$input['policeEmail']}}" required>
                        </div>
                    </div>
                    <div class="row mt-2 ">
                        <div class="col-auto">
                            <label for="password" class="col-form-label">Password:</label>
                        </div>
                        <div class="col-md-3">
                            <input name="password" id="password" type="password" class="form-control align-content-center w-100" aria-describedby="passwordHelpInline" required>
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
                        <div class="col-auto">
                            <span id="passwordHelpInline" class="form-text">
                            Must be 8-20 characters long.
                            </span>
                        </div>
                    </div>
                    <div class="row mt-2 ">
                        <div class="col-auto">
                            <label for="conpassword" class="col-form-label">Confirm Password:</label>
                        </div>
                        <div class="col-md-3">
                            <input name="conpassword" id="conpassword" type="password" class="form-control align-content-center w-100" required>
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
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-8">Upload Valid Credentials for Verification</div>
                        <div class="row mt-2 ">
                            <div class="col-auto">
                                <label for="myFilePoliceLogo" class="col-form-label">Police Station Logo:</label>
                            </div>
                            <div class="col-md-3">
                                <input name="filePoliceLogo" id="myFilePoliceLogo" type="file" class="form-control align-content-center w-100" required>
                            </div>
                        </div>
                        <div class="row mt-2 ">
                            <div class="col-auto">
                                <label for="myFilePoliceIDFront" class="col-form-label">Valid ID Front:</label>
                            </div>
                            <div class="col-md-3">
                                <input name="filePoliceIDFront" id="myFilePoliceIDFront" type="file" class="form-control align-content-center w-100" required>
                            </div>
                        </div>
                        <div class="row mt-2 ">
                            <div class="col-auto">
                                <label for="myFilePoliceIDBack" class="col-form-label">Valid ID Back:</label>
                            </div>
                            <div class="col-md-3">
                                <input name="filePoliceIDBack" id="myFilePoliceIDBack" type="file" class="form-control align-content-center w-100" required>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center m-5"><button type="submit" class="btn btn-light w-25">Submit</button></div>
                </div>
            @else
                <div class="container border-secondary">
                    <div class="row mb-3">
                        <div class="col-auto">
                            <label for="PS_name" class="col-form-label">Police Station Name:</label>
                        </div>
                        <div class="col-auto "><input name="policeStationName" id="PS_name" type="text" class="form-control align-content-center w-100" required></div>
                    </div>
                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-auto">
                        <label for="cn1" class="col-form-label">Police Station Jurisdiction:</label>
                        </div>
                        <div class="col-auto">
                        <input type="text" name="policejurisdiction" id="cn1" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-auto">
                            <label for="PO_name" class="col-form-label">Police Officer Name:</label>
                        </div>
                        <div class="col-auto ">
                            <input name="policeOfficerName" id="PO_name" type="text" class="form-control align-content-center w-100" required>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-auto">
                        <label for="cn1" class="col-form-label">Police Officer Position:</label>
                        </div>
                        <div class="col-auto">
                        <input type="text" name="policePosition" id="cn1" class="form-control" required>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mb-5">
                        <div class="col-auto">
                        <label for="cn1" class="col-form-label">Police Officer Contact number:</label>
                        </div>
                        <div class="col-auto">
                        <input type="text" name="policeContact" id="cn1" class="form-control" required>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-auto">Address</div>
                        <div class="col-auto">
                            <select class="form-select" name="province" id="province" aria-label="province selection" required>
                                <option selected disabled>Province</option>
                                <option value="Cebu">Cebu</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <select class="form-select" name="city" id="City" aria-label="city selection" required>
                                <option selected disabled>City</option>
                                <option value="Cebu City">Cebu City</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <select class="form-select" name="barangay" id="barangay" aria-label="barangay selection" required>
                                <option selected disabled>Barangay</option>
                                <option value="Apas">Apas</option>
                                <option value="Kasambagan">Kasambagan</option>
                                <option value="Lahug">Lahug</option>
                                <option value="Luz">Luz</option>
                                <option value="Mabolo">Mabolo</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2 ">
                        <div class="col-auto">
                            <label for="purok" class="col-form-label">Purok:</label>
                        </div>
                        <div class="col-auto">
                            <input name="purok" id="purok" type="text" class="form-control align-content-center w-100" required>
                        </div>
                    </div>
                    <div class="row mt-2 ">
                        <div class="col-auto">
                            <label for="street" class="col-form-label">Street:</label>
                        </div>
                        <div class="col-md-auto">
                            <input name="street" id="street" type="text" class="form-control align-content-center w-100" required>
                        </div>
                    </div>
                    <div class="row mt-2 ">
                        <div class="col-auto">
                            <label for="zip" class="col-form-label">Zipcode:</label>
                        </div>
                        <div class="col-auto">
                            <input name="zipcode" id="zip" type="text" class="form-control align-content-center w-100" required>
                        </div>
                    </div>
                    <div class="row mt-2 ">
                        <div class="col-auto">
                            <label for="email" class="col-form-label">Email:</label>
                        </div>
                        <div class="col-md-auto">
                            <input name="email" id="email" type="text" class="form-control align-content-center w-100" required>
                        </div>
                    </div>
                    <div class="row mt-2 ">
                        <div class="col-auto">
                            <label for="password" class="col-form-label">Password:</label>
                        </div>
                        <div class="col-md-3">
                            <input name="password" id="password" type="password" class="form-control align-content-center w-100" aria-describedby="passwordHelpInline" required>
                        </div>
                        <div class="col-auto">
                            <span id="passwordHelpInline" class="form-text">
                            Must be 8-20 characters long.
                            </span>
                        </div>
                    </div>
                    <div class="row mt-2 ">
                        <div class="col-auto">
                            <label for="conpassword" class="col-form-label">Confirm Password:</label>
                        </div>
                        <div class="col-md-3">
                            <input name="conpassword" id="conpassword" type="password" class="form-control align-content-center w-100" required>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-8">Upload Valid Credentials for Verification</div>
                        <div class="row mt-2 ">
                            <div class="col-auto">
                                <label for="myFilePoliceLogo" class="col-form-label">Police Station Logo:</label>
                            </div>
                            <div class="col-md-3">
                                <input name="filePoliceLogo" id="myFilePoliceLogo" type="file" class="form-control align-content-center w-100" required>
                            </div>
                        </div>
                        <div class="row mt-2 ">
                            <div class="col-auto">
                                <label for="myFilePoliceIDFront" class="col-form-label">Valid ID Front:</label>
                            </div>
                            <div class="col-md-3">
                                <input name="filePoliceIDFront" id="myFilePoliceIDFront" type="file" class="form-control align-content-center w-100" required>
                            </div>
                        </div>
                        <div class="row mt-2 ">
                            <div class="col-auto">
                                <label for="myFilePoliceIDBack" class="col-form-label">Valid ID Back:</label>
                            </div>
                            <div class="col-md-3">
                                <input name="filePoliceIDBack" id="myFilePoliceIDBack" type="file" class="form-control align-content-center w-100" required>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center m-5"><button type="submit" class="btn btn-light w-25">Submit</button></div>
                </div>
            @endif
        </form>

        <!-- Scripts -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
</html>
