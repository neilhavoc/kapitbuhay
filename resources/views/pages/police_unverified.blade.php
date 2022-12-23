<!DOCTYPE html>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <body>
    <div class="container-fluid" style="overflow-y: scroll; overflow-x: hidden; height:560px;">
<div class="position-relative mb-3">
  <h1 class="position-absolute top-0 start-0"> Manage Account</h1>
</div>
                            <div class="row mb-5 row1">
                                <div class="col-md-2 mt-1">
                                    <img src="ball.jpg" alt="Ball" class="profile">
                                </div>

                                    <div class="row mt-2">
                                        <h5 class="col-md-2">User ID: </h5>
                                        <h5 id="userID" class="col-md-4">sample</h5>
                                    </div>
                                    <div class="row mt-2">
                                        <h5 class="col-md-2">Name:</h5>
                                        <input type="text" class="col-md-5">
                                    </div>
                                    <div class="row mt-2">
                                        <h5 class="col-md-2">Contact No:</h5>
                                        <input type="text" class="col-md-5">
                                    </div>
                                    <div class="row mt-2">
                                        <h5 class="col-md-2">Address:</h5>
                                        <div class="col-md-1 mt-2">
                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Region</button>
                                         <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                                        </ul>
                                        </div>
                                        &nbsp;
                                        &nbsp;
                                        &nbsp;
                                        <div class="col-md-1 mt-2">
                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Province</button>
                                         <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                                        </ul>
                                        </div>
                                        &nbsp;
                                        &nbsp;
                                        &nbsp;
                                        &nbsp;
                                        <div class="col-md-1 mt-2">
                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">City</button>
                                         <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                                        </ul>
                                        </div>
                                        &nbsp;
                                        &nbsp;
                                        <div class="col-md-1 mt-2">
                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Barangay</button>
                                         <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                                        </ul>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <h5 class="col-md-2">Street:</h5>
                                        <input type="text" class="col-md-5">
                                    </div>
                                    <div class="row mt-2">
                                        <h5 class="col-md-2">Email:</h5>
                                        <input type="text" class="col-md-5">
                                    </div>
                                    <div class="row mt-2">
                                        <h5 class="col-md-2">Username:</h5>
                                        <input type="text" class="col-md-5">
                                    </div>
                                    <div class="row mt-2 mb-3">
                                        <h5 class="col-md-2">Password:</h5>
                                        <input type="text" class="col-md-5">
                                    </div>

                            <div class="footer">
                            <button type="button" class="btn btn-primary">Save</button>
                            </div>
                            </div>
</div>
    </body>
</html>

<style>
.profile{
    height: 170x;
    width: 200px;
    margin-top: 50px;
}
.footer{
    margin-left: 380px;
}
</style>

