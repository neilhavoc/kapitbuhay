<!DOCTYPE html>
<html lang="en">

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
                    <li class="nav-item"><a class="nav-link" href="#" style="color: gray;font-size: large;font-weight: 500;">Admin&nbsp;<i class="far fa-user-circle" style="font-size: 25px;"></i></a></li>
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
                    <li class="nav-item"><a class="nav-link" href="dashboard" style="color: black;">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link"  href="report" style="color: black;">Incident Reports</a></li>
                    <li class="nav-item"><a class="nav-link"  href="account" style="color: black;">Manage Accounts</a></li>
                    <li class="nav-item"><a class="nav-link"  href="article" style="color: black;">Articles</a></li>
                    <li class="nav-item"><a class="nav-link"  href="feedback" style="color: black;">User Feedbacks</a></li>
                </ul>
            </div>
        </div>s
    </nav>
    <script>
       const activePage = window.location.pathname;
const navLinks = document.querySelectorAll('#snav a').forEach(link => {
  if(link.href.includes(`${activePage}`)){
    link.classList.add('active');
    console.log(link);
  }
})
    </script>

</body>

</html>

<style>

  .navbar-brand {
  font-weight: 500;
  font-size: larger;
  color: gray;
  }

  .navbar ul li a.active{
    background: white;
    border-radius: 25px;
  }

</style>


