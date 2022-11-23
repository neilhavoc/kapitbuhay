@extends('layouts.index')


@section('styles')
<style>
     .search {
    margin-top: 10px;
 }

 .bill-header.cs {
  background-color: rgba(37,71,106,0.56);
  color: #fff;
}

.modal-footer-text-center {
    text-align: center;
    margin-bottom: 1%;
}

    #wrapper {
    padding-left: 0;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#wrapper.toggled {
    padding-left: 250px;
}

#sidebar-wrapper {
    z-index: 1000;
    position: fixed;
    left: 250px;
    width: 0;
    height: 100%;
    margin-left: -250px;
    overflow-y: auto;
    background: #000;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#wrapper.toggled #sidebar-wrapper {
    width: 250px;
}

#page-content-wrapper {
    width: 100%;
    position: absolute;
    padding: 15px;
}

#wrapper.toggled #page-content-wrapper {
    position: absolute;
    margin-right: -250px;
}


/* Sidebar Styles */

.sidebar-nav {
    position: absolute;
    top: 0;
    width: 250px;
    margin: 0;
    padding: 0;
    list-style: none;
}

.sidebar-nav li {
    text-indent: 20px;
    line-height: 40px;
}

.sidebar-nav li a {
    display: block;
    text-decoration: none;
    color: #999999;
}

.sidebar-nav li a:hover {
    text-decoration: none;
    color: #fff;
    background: rgba(255,255,255,0.2);
}

.sidebar-nav li a:active,
.sidebar-nav li a:focus {
    text-decoration: none;
}

.sidebar-nav > .sidebar-brand {
    height: 65px;
    font-size: 18px;
    line-height: 60px;
}

.sidebar-nav > .sidebar-brand a {
    color: #999999;
}

.sidebar-nav > .sidebar-brand a:hover {
    color: #fff;
    background: none;
}

@media(min-width:768px) {
    #wrapper {
        padding-left: 250px;
    }

    #wrapper.toggled {
        padding-left: 0;
    }

    #sidebar-wrapper {
        width: 250px;
    }

    #wrapper.toggled #sidebar-wrapper {
        width: 0;
    }

    #page-content-wrapper {
        padding: 20px;
        position: relative;
    }

    #wrapper.toggled #page-content-wrapper {
        position: relative;
        margin-right: 0;
    }
}
</style>

@stop

@section('content')
<div id="wrapper"><!--man_account-->
    <!-- Sidebar  components-->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    Accounts
                </a>
            </li>
            <li>
                <a class="btn btn-secondary text-dark" id="police">Police</a>
            </li>
            <li>
                <a class="btn btn-secondary text-dark" id="vaw">VAW</a>
            </li>
            <li>
                <a class="btn btn-secondary text-dark" id="victim">Victim</a>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper manage accounts-->

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <a href="" class="btn btn-default " id="menu-toggle">
                <i class="fa-solid fa-arrow-left-long" id="icon"></i>
            </a>

            <div class="row" >
                <div class="col-lg-12">

                    <!--police contents pages-->
                    <div id="content_police">
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
                                        <tr class="justify-contents-center ">
                                            <td>01</td>
                                            <td>Sample</td>
                                            <td>Sample</td>
                                            <td>Sample</td>
                                            <td>Sample</td>
                                            <td><button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#viewPolice">View</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal fade" id="viewPolice" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                                            <h5 class="modal-title position-absolute top-25 start-50 translate-middle" id="staticBackdropLabel">View Police Profile</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container border-secondary" style="height:400px; margin-top:0%; margin-bottom:0%;">
                                                <div class="row mt-5 no-gutter">
                                                    <div class="col-md-2 mb-2 fw-bold">ID:</div>
                                                    <div class="col-md-4 "><input  id="pol_id" type="text" class="form-control align-content-center w-100"  placeholder="" disabled="disabled" ></div>
                                                </div>
                                                <div class="row mt-3 no-gutter">
                                                    <div class="col-md-2 fw-bold">Police Station Name:</div>
                                                    <div class="col-md-4"> <input  id="pol_name" type="text" class="form-control align-content-center w-100"  placeholder="" disabled="disabled" ></div>
                                                </div>
                                                <div class="row mt-3 no-gutter">
                                                    <div class="col-md-2 fw-bold">Address: </div>
                                                    <div class="col-md-4"> <input  id="pol_address" type="text" class="form-control align-content-center w-100"  placeholder="" disabled="disabled" ></div>
                                                </div>
                                                <div class="row mt-3 no-gutter">
                                                    <div class="col-md-2 fw-bold">Email: </div>
                                                    <div class="col-md-4"> <input  id="pol_email" type="text" class="form-control align-content-center w-100"  placeholder="" disabled="disabled" ></div>
                                                </div>
                                                <div class="row mt-3 no-gutter">
                                                    <div class="col-md-2 fw-bold">Contact: </div>
                                                    <div class="col-md-4"> <input  id="pol_contact" type="text" class="form-control align-content-center w-100"  placeholder="" disabled="disabled" ></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--VAW contents papges-->
                    <div id="content_vaw">
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
                                            <th id="trs-hd-2" class="col-lg-3">VAW Station Name</th>
                                            <th id="trs-hd-3" class="col-lg-3">Address</th>
                                            <th id="trs-hd-4" class="col-lg-3">Email</th>
                                            <th id="trs-hd-4" class="col-lg-2">Contact</th>
                                            <th id="trs-hd-4" class="col-lg-2"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="justify-contents-center ">
                                            <td>01</td>
                                            <td>Sample</td>
                                            <td>Sample</td>
                                            <td>Sample</td>
                                            <td>Sample</td>
                                            <td><button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#viewVaw">View</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal fade" id="viewVaw" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                                            <h5 class="modal-title position-absolute top-25 start-50 translate-middle" id="staticBackdropLabel">View Police Profile</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container border-secondary" style="height:400px; margin-top:0%; margin-bottom:0%;">
                                                <div class="row mt-5 no-gutter">
                                                    <div class="col-md-2 mb-2 fw-bold">ID:</div>
                                                    <div class="col-md-4 "><input  id="vaw_id" type="text" class="form-control align-content-center w-100"  placeholder="" disabled="disabled" ></div>
                                                </div>
                                                <div class="row mt-3 no-gutter">
                                                    <div class="col-md-2 fw-bold">VAW Station Name:</div>
                                                    <div class="col-md-4"> <input  id="vaw_name" type="text" class="form-control align-content-center w-100"  placeholder="" disabled="disabled" ></div>
                                                </div>
                                                <div class="row mt-3 no-gutter">
                                                    <div class="col-md-2 fw-bold">Address: </div>
                                                    <div class="col-md-4"> <input  id="vaw_address" type="text" class="form-control align-content-center w-100"  placeholder="" disabled="disabled" ></div>
                                                </div>
                                                <div class="row mt-3 no-gutter">
                                                    <div class="col-md-2 fw-bold">Email: </div>
                                                    <div class="col-md-4"> <input  id="vaw_email" type="text" class="form-control align-content-center w-100"  placeholder="" disabled="disabled" ></div>
                                                </div>
                                                <div class="row mt-3 no-gutter">
                                                    <div class="col-md-2 fw-bold">Contact: </div>
                                                    <div class="col-md-4"> <input  id="vaw_contact" type="text" class="form-control align-content-center w-100"  placeholder="" disabled="disabled" ></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Victim contents pages-->
                    <div id="content_victim">
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
                                        <tr class="justify-contents-center ">
                                            <td>01</td>
                                            <td>Sample</td>
                                            <td>Sample</td>
                                            <td>Sample</td>
                                            <td>Sample</td>
                                            <td><button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#viewVictim">View</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal fade" id="viewVictim" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                                            <h5 class="modal-title position-absolute top-25 start-50 translate-middle" id="staticBackdropLabel">View Police Profile</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container border-secondary" style="height:400px; margin-top:0%; margin-bottom:0%;">
                                                <div class="row mt-5 no-gutter">
                                                    <div class="col-md-2 mb-2 fw-bold">ID:</div>
                                                    <div class="col-md-4 "><input  id="vic_id" type="text" class="form-control align-content-center w-100"  placeholder="" disabled="disabled" ></div>
                                                </div>
                                                <div class="row mt-3 no-gutter">
                                                    <div class="col-md-2 fw-bold">Victim Name:</div>
                                                    <div class="col-md-4"> <input  id="vic_name" type="text" class="form-control align-content-center w-100"  placeholder="" disabled="disabled" ></div>
                                                </div>
                                                <div class="row mt-3 no-gutter">
                                                    <div class="col-md-2 fw-bold">Address: </div>
                                                    <div class="col-md-4"> <input  id="vic_address" type="text" class="form-control align-content-center w-100"  placeholder="" disabled="disabled" ></div>
                                                </div>
                                                <div class="row mt-3 no-gutter">
                                                    <div class="col-md-2 fw-bold">Email: </div>
                                                    <div class="col-md-4"> <input  id="vic_email" type="text" class="form-control align-content-center w-100"  placeholder="" disabled="disabled" ></div>
                                                </div>
                                                <div class="row mt-3 no-gutter">
                                                    <div class="col-md-2 fw-bold">Contact: </div>
                                                    <div class="col-md-4"> <input  id="vic_contact" type="text" class="form-control align-content-center w-100"  placeholder="" disabled="disabled" ></div>
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
        </div>
    </div>
</div>
@stop


@section('scripts')
<script>
     $(document).ready(function(){
        $("#content_victim").hide();
        $("#content_vaw").hide();
        $("#content_police").show();
      $("#police").click(function(){
        $("#content_police").show();
        $("#content_victim").hide();
        $("#content_vaw").hide();
      });
      $("#vaw").click(function(){
        $("#content_police").hide();
        $("#content_victim").hide();
        $("#content_vaw").show();
      });
      $("#victim").click(function(){
        $("#content_police").hide();
        $("#content_victim").show();
        $("#content_vaw").hide();
      });
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    });
</script>
@stop
