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
        <form action="register" method="POST">
            <div class="container border-secondary">
                <div class="row mb-3">
                    <div class="col-auto">
                        <label for="PS_name" class="col-form-label">Polise Station Name:</label>
                    </div>
                    <div class="col-auto "><input name="Police_Station_Name" id="PS_name" type="text" class="form-control align-content-center w-100"></div>
                </div>
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-auto">
                      <label for="cn1" class="col-form-label">Contact no. 1:</label>
                    </div>
                    <div class="col-auto">
                      <input type="text" id="cn1" class="form-control">
                    </div>
                    <div class="col-auto">
                        <label for="cn2" class="col-form-label">Contact no. 2:</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="cn2" class="form-control">
                    </div>
                </div>
                <div class="row g-3 align-items-center mb-5">
                    <div class="col-auto">Address</div>
                    <div class="col-auto">
                        <select class="form-select" id="province" aria-label="province selection">
                            <option selected disabled>Province</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                    </div>
                    <div class="col-auto">
                        <select class="form-select" id="City" aria-label="city selection">
                            <option selected disabled>City</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                    </div>
                    <div class="col-auto">
                        <select class="form-select" id="barangay" aria-label="barangay selection">
                            <option selected disabled>Barangay</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                    </div>
                </div>
                <div class="row mt-2 ">
                    <div class="col-auto">
                        <label for="purok" class="col-form-label">Purok:</label>
                    </div>
                    <div class="col-auto">
                        <input name="purok" id="purok" type="text" class="form-control align-content-center w-100">
                    </div>
                </div>
                <div class="row mt-2 ">
                    <div class="col-auto">
                        <label for="street" class="col-form-label">Street:</label>
                    </div>
                    <div class="col-md-auto">
                        <input name="street" id="street" type="text" class="form-control align-content-center w-100">
                    </div>
                </div>
                <div class="row mt-2 ">
                    <div class="col-auto">
                        <label for="email" class="col-form-label">Email:</label>
                    </div>
                    <div class="col-md-auto">
                        <input name="email" id="email" type="text" class="form-control align-content-center w-100">
                    </div>
                </div>
                <div class="row mt-2 ">
                    <div class="col-auto">
                        <label for="password" class="col-form-label">Password:</label>
                    </div>
                    <div class="col-md-3">
                        <input name="password" id="password" type="text" class="form-control align-content-center w-100" aria-describedby="passwordHelpInline">
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
                        <input name="password" id="conpassword" type="text" class="form-control align-content-center w-100" >
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-8">Upload Valid Credentials for Verification</div>
                </div>

                <div class="row justify-content-center m-5"><button type="submit" class="btn btn-light w-25">Submit</button></div>
            </div>
        </form>

        <!-- Scripts -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
</html>
