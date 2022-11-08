<!DOCTYPE html>
<html>
    <body>
        <div class="container">
            <div class="row justify-content-center align-items-center mt-5">
                <div class="col-md-12" style="height:250px; width:250px;">
                   <?php
                   echo "<img src='static\Kapit_Buhay_Logo.png'>";
                   ?>
                </div>
            </div>
            <div class="row justify-content-center align-items-center m-2">
                <div class="col-md-6">
                    <h1 class="text-center">Welcome</h1>
                </div>
            </div>
            <div class="row justify-content-center align-items-center m-3">
                <div class="border" style="height:300px; width:350px">
                    <div class="row mt-5 no-gutters">
                        <div class="col-md-5 text-end">Username</div>
                        <div class="col-md-7">
                            <input type="email" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-5 text-end">Password</div>
                        <div class="col-md-7">
                            <input type="password" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-5 mx-3">
                          <div class="col-md-12">
                        <button type="button" class="btn btn-light w-100">login</button>
                        </div>
                    </div>
                    <div class="row mt-4 w-100 mx-1">
                        <div class="col-md-12 text-center"><button type="button" class="btn btn-light w-50"   data-bs-toggle="modal" data-bs-target="#registerModal">Create Account</button></div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg p-5">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="registerModalLabel">Registration</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                         </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
