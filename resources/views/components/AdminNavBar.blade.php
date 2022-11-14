<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>NavBar</title>
    @include ('components.AdminHeader')
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> <img src="{{ asset('Kapit_Buhay_Icon.png') }}"/>&nbsp; KapitBuhay</a>
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1">
                <span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#"><i class="far fa-bell" style="font-size: 25px;color: gray;"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="#" style="color: gray;font-size: large;font-weight: 500;">Admin&nbsp;<i class="far fa-user-circle" style="font-size: 25px;"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <ul class="nav nav-tabs fs-6" style="background-color:gray;">
       <li class="nav-item" ><a class="nav-link " href="dashboard" style="color: black;">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link " href="incidentreport" style="color: black;">Incident Reports</a></li>
        <li class="nav-item"><a class="nav-link " href="account" style="color: black;">Manage Accounts</a></li>
        <li class="nav-item"><a class="nav-link " href="article" style="color: black;">Articles</a></li>
        <li class="nav-item"><a class="nav-link " href="userFeedbacks" style="color: black;">User Feedbacks</a></li>
    </ul>

</body>

</html>

<style scoped>

  .navbar-brand {
  font-weight: 500;
  font-size: larger;
  color: gray;
  }


</style>
