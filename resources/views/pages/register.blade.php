<form action="register" method="POST">
    @csrf
    <div class="container border-secondary" style="height:500px; margin-top:5%; margin-bottom:5%;">
        <div class="row">
            <div class="col-md-4 mb-2">
                Full Name
            </div>
        </div>
        <div class="row ">
            <div class="col-md-4 "><input name="firstname" id="firstname" type="text" class="form-control align-content-center w-100"  placeholder="First Name" ></div>
            <div class="col-md-4 "><input name="middlename" id="middlename" type="text" class="form-control align-content-center w-100"  placeholder="Middle Name" ></div>
            <div class="col-md-4 "><input name="lastname" id="lastname" type="text" class="form-control align-content-center w-100"  placeholder="Last Name" ></div>
        </div>
        <div class="row mt-5">
            <div class="col-md-8">Address</div>
        </div>
        <div class="row mt-2 ">
            <div class="col-md-3"> <input name="region" id="region" type="text" class="form-control align-content-center w-100"  placeholder="Region" ></div>
            <div class="col-md-3"> <input name="province" id="province" type="text" class="form-control align-content-center w-100"  placeholder="Province" ></div>
            <div class="col-md-3"> <input name="city" id="city" type="text" class="form-control align-content-center w-100"  placeholder="City" ></div>
            <div class="col-md-3"> <input name="brgy" id="brgy" type="text" class="form-control align-content-center w-100"  placeholder="Barangay" ></div>
        </div>
        <div class="row mt-5">
            <div class="col-md-8">Contact Information</div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4"> <input name="email" id="email" type="text" class="form-control align-content-center w-100"  placeholder="E-mail" ></div>
            <div class="col-md-4"> <input name="cellnum" id="cellnum" type="number" class="form-control align-content-center w-100"  placeholder="Cellphone Number" ></div>
            <div class="col-md-4"> <input name="telnum" id="telnum" type="text" class="form-control align-content-center w-100"  placeholder="Telephone Number" ></div>
        </div>
        <div class="row mt-5">
            <div class="col-md-8">Login Information</div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4"> <input name="username" id="username" type="text" class="form-control align-content-center w-100"  placeholder="Username" ></div>
            <div class="col-md-4"> <input name="password" id="password" type="password" class="form-control align-content-center w-100"  placeholder="Password" ></div>
            <div class="col-md-4"> <input name="repassword" id="repassword" type="password" class="form-control align-content-center w-100"  placeholder="Retype Password" ></div>
        </div>

        <div class="row justify-content-center m-5"><button type="submit" class="btn btn-light w-25">Submit</button></div>
    </div>
</form>
