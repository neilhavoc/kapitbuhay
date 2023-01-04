<!DOCTYPE html>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <body>
    <div class="container-fluid">
    <div class="title mt-5 position-absolute top-0 start-50 translate-middle">
        <h1>
            Victim Health Status Record
        </h1>
    </div>
                        <div class="container border-secondary" style="height:400px; margin-top:10%; margin-bottom:0%; overflow-y: scroll; overflow-x: hidden;">
                            <div class="row mb-3 row1">
                                <div class="col-md-2 mx-5">
                                    <img src="ball.jpg" alt="Ball" class="profile">
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <h5 class="col-md-4">User ID: </h5>
                                        <h5 id="userID" class="col-md-1">sample</h5>
                                    </div>
                                    <div class="row mt-1">
                                        <h5 class="col-md-4">Victim:</h5>
                                        <h5 id="victim" class="col-md-1">sample</h5>
                                    </div>
                                    <div class="row mt-1">
                                        <h5 class="col-md-4">Address:</h5>
                                        <h5 id="address" class="col-md-1">sample</h5>
                                    </div>
                                    <div class="row mt-1">
                                        <h5 class="col-md-4">Location Link:</h5>
                                        <h5 id="loclink" class="col-md-1">sample</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <h5 class="col-md-2">Monitoring: </h5>
                            </div>
                            <div class="form-group mt-2">
                                <table class="table table-hover table-bordered text-center ">
                                    <thead class="bill-header cs">
                                        <tr>
                                            <th id="trs-hd-1" class="col-lg-2">Date Created</th>
                                            <th id="trs-hd-2" class="col-lg-1">Title</th>
                                            <th id="trs-hd-3" class="col-lg-2">Physical Health</th>
                                            <th id="trs-hd-4" class="col-lg-2">Mental Health</th>
                                            <th id="trs-hd-5" class="col-lg-2">Last Modified</th>
                                            <th id="trs-hd-6" class="col-lg-3">Monitoring Status</th>
                                            <th id="trs-hd-7" class="col-lg-2"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="justify-contents-center ">
                                            <td>01</td>
                                            <td>Sample</td>
                                            <td>Sample</td>
                                            <td>Sample</td>
                                            <td>Sample</td>
                                            <td>Sample</td>
                                            <td><button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#viewVAW">View</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


        <div class="modal fade" id="viewVAW" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-dismiss="modal">Back</button>
                        <h3 class="modal-title position-absolute top-30 start-50 translate-middle" id="staticBackdropLabel">View Day <label>#</label> Monitoring Report</h3>
                    </div>
                    <div class="modal-body">
                    <div class="container border-secondary" style="height:400px; margin-top:0%; margin-bottom:0%;">
                    <div class="row">
        <div class="col-md-6 mt-5  mb-0">
            <button class="btn btn-primary h-100  " type="button">Physical Health</button>
            <button class="btn btn-primary h-100  " type="button">Mental Health</button>
        </div>
        </div>
                                <div class="row ">
                                    <div class="col-md-8 ">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" disabled="disabled"></textarea></div>
                                    </div>

                                    <div class="row mt-5">
                                <div class="col-md-4 fw-bold"> Remarks: <textarea class="form-control" id="exampleFormControlTextarea2" rows="2" disabled="disabled"></textarea></div>
                                <div class="col-md-4">
                                <div class="row">
            <div class="row">
                <div class="fw-bold ">Monitoring Status:</div>
            </div>
            <div class="row">
                <label>sample</label>
            </div>
            <div class="row">
                <div class="fw-bold ">Monitored By:</div>
            </div>
            <div class="row">
                <label>sample</label>
            </div>
        </div>
    </div>
    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>




    </body>
</html>

<style>
.profile{
    height: 170x;
    width: 200px;
}
.credential{
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
.button {
    text-align: center;
    margin-top: 1%;
}
</style>

