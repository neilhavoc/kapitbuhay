<!DOCTYPE html>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center align-items-center mt-5">
                <div class="col-md-12" style="height:250px; width:250px;">
                   <img src="{{ asset('Kapit_Buhay_Logo.png') }}"/>
                </div>
            </div>
            <div class="row justify-content-center align-items-center m-2">
                <div class="col-md-6">
                    <h1 class="text-center">Welcome</h1>
                </div>
            </div>
            <form action="loginpage" method="POST">
                @csrf
                <div class="row justify-content-center align-items-center m-3">
                    <div class="border" style="height:300px; width:350px">
                        <div class="row mt-5 no-gutters">
                            <div class="col-md-5 text-end">Email</div>
                            <div class="col-md-7">
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-5 text-end">Password</div>
                            <div class="col-md-7">
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mt-5 mx-3">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-light w-100" >login</button>


                            </div>
                        </div>
                        <div class="row mt-4 w-100 mx-1">
                            <div class="col-md-12 text-center"><button type="button" class="btn btn-light w-50"   data-bs-toggle="modal" data-bs-target="#registerModal">Create Account</button></div>
                        </div>
                    </div>
                </div>
            </form>
            @if (session('success'))
                <div class="alert alert-danger text-center" role="alert">
                    {{ session()->get('success') }}
                </div>
            @enderror
            <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg p-5">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="registerModalLabel">Registration</h1>
                            <button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="height: 400px;">
                            @include('pages.register')
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

