<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>NavBar</title>
    @include ('components.AdminHeader')
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
</head>

<body>

        <!-- Sidebar -->
        <div class="sidebar">
            <div class="menu">
                <i class="fa fa-bars"></i>
            </div>
            <h3>Accounts</h3>

            <a href="PoliceReport">
                <i class="fa fa-handcuffs"></i>
                <span>Police</span>
            </a>
            <a href="VawReport" >
                <i class="fa fa-hands-holding-child"></i>
                <span>VAW</span>
            </a>
        </div>


</body>


<style>
    *{
        padding: 0;
        margin: 0;
        text-decoration: none;
        list-style: none;
        box-sizing: border-box;
    }

    .sidebar{
        position: fixed !important;
        background: rgb(248, 88, 88);
        width: 250px;
        height: 100%;
    }

    .sidebar h3{
        color: white;
        width: 100%;
        margin-left: 10px;
    }

    .sidebar a {
        display: block;
        line-height: 60px;
        transition: 0.5s;
        padding-left: 20px;
        color: white;
    }

    .sidebar a:hover{
        background: rgb(178, 5, 5);
        padding-left: 20px;
    }

    .sidebar span{
        font-size: 20px;
        margin-left:10px;
        color:white;
    }

    .sidebar a:link{
        text-decoration: none;
    }

    .menu{
        display: none;
    }

@media (max-width:850px){
    .sidebar a span, h3{
        display: none;
    }
    .sidebar{
        width:100px;
    }
.sidebar a{
        display:block;
        line-height: 80px;
        text-align: center;
        margin-left: 0;
        font-size: 35px;
        padding-left:0;
    }
}
</style>
