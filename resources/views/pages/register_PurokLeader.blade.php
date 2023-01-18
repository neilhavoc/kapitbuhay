<!DOCTYPE html>
<html>
    <head>


    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>KapitBuhay - Purok Leader </title>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    </head>

    </head>

    <body>
        <h1 class="text-center mb-5">Create New Account for Purok Leader Account</h1>
        <div class="container border-secondary">
            <div class="row mb-3">
                <div class="col-auto">
                    <label for="brgyname" class="col-form-label">Barangay Name:</label>
                </div>
                <div class="col-auto ">
                    <input name="brgyName" id="brgyname" type="text" class="form-control align-content-center w-100" required>
                </div>
            </div>
            <div class="row g-3 align-items-center mb-2">
                <div class="col-auto">
                <label for="cn1" class="col-form-label">Barangay Contact Num:</label>
                </div>
                <div class="col-auto">
                <input type="number" name="brgyConNum" id="cn1" class="form-control" required>
                </div>
                <div class="col-auto">
                    <span id="barangaynameHelpLine" class="form-text">
                    Do not include first number '0'
                    </span>
                </div>
            </div>
            <div class="row g-3 align-items-center mb-2">
                <div class="col-auto">
                    <label for="cn1" class="col-form-label">Barangay VAW Staff Full Name:</label>
                </div>
                <div class="col-auto">
                    <input type="text" name="staffFullName" id="cn1" class="form-control" required>
                </div>
                <div class="col-auto">
                    <span id="barangaynameHelpLine" class="form-text">
                    First Name, Middle Initial, Last Name example: (Juan E. Dela Cruz)
                    </span>
                </div>
            </div>
            <div class="row g-3 align-items-center mb-5">
                <div class="col-auto">
                    <label for="cn1" class="col-form-label">Barangay VAW Staff Position:</label>
                </div>
                <div class="col-auto">
                    <input type="text" name="staffPosition" id="cn1" class="form-control" required>
                </div>
            </div>
            <div class="row g-3 align-items-center ">
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
                    <label for="purok" class="col-form-label">Zipcode:</label>
                </div>
                <div class="col-auto">
                    <input name="zipcode" id="zipcode" type="number" class="form-control align-content-center w-100" required>
                </div>
            </div>
            <div class="row mt-2 ">
                <div class="col-auto">
                    <label for="email" class="col-form-label">Email Address:</label>
                </div>
                <div class="col-md-auto">
                    <input name="email" id="email" type="text" class="form-control align-content-center w-100" required>
                </div>
                <div class="col-auto">
                    <span id="emailHelpLine" class="form-text">
                    must be working e-mail address
                    </span>
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
                        <label for="myFileBrgyLogo" class="col-form-label">Barangay Logo:</label>
                    </div>
                    <div class="col-md-3">
                        <input name="fileBrgyLogo" id="myFileBrgyLogo" type="file" class="form-control align-content-center w-100" required>
                    </div>
                </div>
                <div class="row mt-2 ">
                    <div class="col-auto">
                        <label for="myFileBrgyIDFront" class="col-form-label">Valid ID Front:</label>
                    </div>
                    <div class="col-md-3">
                        <input name="fileBrgyIDFront" id="myFileBrgyIDFront" type="file" class="form-control align-content-center w-100" required>
                    </div>
                </div>
                <div class="row mt-2 ">
                    <div class="col-auto">
                        <label for="myFileBrgyIDBack" class="col-form-label">Valid ID Back:</label>
                    </div>
                    <div class="col-md-3">
                        <input name="fileBrgyIDBack" id="myFileBrgyIDBack" type="file" class="form-control align-content-center w-100" required>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center m-5"><button type="submit" class="btn btn-light w-25">Submit</button></div>
        </div>

        </form>

        <!-- Scripts -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="module">

    </body>
</html>
