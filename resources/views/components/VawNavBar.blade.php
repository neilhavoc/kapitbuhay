<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title></title>
    @include ('components.AdminHeader')
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
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
                    <li class="nav-item"><a class="nav-link" href="#"><i class="far fa-bell" style="font-size: 25px;color: gray;"></i></a></li>
                    <li class="nav-item dropdown"><a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" style="color: gray;font-size: large;font-weight: 500; width:200px;" >Barangay VAW&nbsp;<i class="far fa-user-circle" style="font-size: 25px;" ></i></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item text-danger fw-heavy" href="#">Log out</a></li>
                          </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-light navbar-expand-md bg-secondary" id="snav">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2">
                <span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="vaw_reports" style="color: black;">Incident Report</a></li>
                    <li class="nav-item"><a class="nav-link"  href="vaw_monitoring" style="color: black;">Victim's Monitoring</a></li>
                    <li class="nav-item"><a class="nav-link"  href="#" style="color: black;">Victim's Health Report</a></li>
                    <li class="nav-item"><a class="nav-link"  href="#" style="color: black;">Manage Account</a></li>
                </ul>
            </div>
        </div>
    </nav>

</body>

</html>

<style>

  .navbar-brand {
  font-weight: 500;
  font-size: larger;
  color: gray;
  }

  .navbar .navbar-nav .nav-link:hover{
    background: white;
    border-radius: 2px;
    margin:none;
  }


</style>


