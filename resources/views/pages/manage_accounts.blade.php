@extends('layouts.index')


@section('styles')
<style>
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
<div id="wrapper">

    <!-- Sidebar -->
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
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <a href="" class="btn btn-default " id="menu-toggle">
                <i class="fa-solid fa-arrow-left-long" id="icon"></i>
            </a>

            <div class="row" >
                <div class="col-lg-12">
                    <p id="content_police">Police Content</p>
                    <p id="content_vaw">Vaw Content</p>
                    <p id="content_victim">Victime Content</p>
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
        $("#content_police").hide();
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
