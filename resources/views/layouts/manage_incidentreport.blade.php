<!DOCTYPE html>
<html>
    <head>


    <!-- Styles -->
    @include('components.AdminHeader')
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    @yield('styles')

    </head>

    <body>
        @include('components.AdminNavBar')

        <div id="wrapper">
            <!-- Sidebar -->
            @include('components.SidebarIncident')
            <!-- Sidebar contents-->
            <div class="sidebar-contents">

                @yield('content')
            </div>



        </div>

        <!-- Scripts -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        @yield('scripts')
    </body>
</html>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        $("").toggleClass("fa-arrow-right-long");
      });
</script>

<style>
    .search {
        padding-top: 10px;
    }

    .bill-header.cs {
        background-color: rgba(37,71,106,0.56);
        color: #fff;
    }

    .sidebar-contents{
        height: 100vh;
        margin-left: 250px;
    }
    @media (max-width:850px){
        .sidebar-contents{
        height: 100vh;
        margin-left: 100px;
        }
    }

</style>
