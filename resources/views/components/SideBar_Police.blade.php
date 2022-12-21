<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>NavBar</title>
    @include ('components.AdminHeader')
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
</head>

<body style="overflow-y: hidden;">

        <!-- Sidebar -->
        <div class="sidebar">
            {{-- Contents goes here --}}
            <h3>Distress Message</h3>
            <div class="my-3 mx-3" style="border:solid; border-color:black; height:100px;">
            <div class="row">
                        <div class="col-md-6 fw-bold " ><label>REF ID:</label>&nbsp;<label>sample</label></div>
            </div>
            <div class="row">
                        <div class="col-md-6 fw-bold "><label>From:</label>&nbsp;<label>sample</label></div>
            </div>
            <div class="row">
                        <div class="col-md-6 fw-bold "><label>sample</label>&nbsp;<label>sample</label></div>
            </div>
            <div class="row">
                        <div class="col-md-6 fw-bold "><label>sample</label></div>
            </div>
            </div>
        </div>
        {{-- scripts --}}
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
        position: fixed;
        border-color: black;
        border:solid;
        width: 250px;
        height: 100vh;
        overflow-y: hidden;
    }

    .sidebar h3{
        color: black;
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
.sidebar label{
        font-size: x-small;
        margin-left: 1%;
}
</style>
