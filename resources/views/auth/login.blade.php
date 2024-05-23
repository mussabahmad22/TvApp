<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }} ">
    <link rel="icon" type="image/png" href="{{ asset('assets/logo.png') }}">
    <title>
        Login - TV APP
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.css?v=3.1.0') }}" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>



    <script>
        setTimeout(function() {

            $('#mydiv').fadeOut('fast');
        }, 5000);

        function divout() {
            $('#mydiv').fadeOut('fast');
        }
    </script>
</head>

<body class="bg-gray-200">
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100"
            style="background-color:rgb(7, 5, 5);">
            {{-- <span class="mask bg-gradient-dark opacity-2"></span> --}}



            <div class="container my-auto">

                <img src="{{ asset('assets/logo.png') }}"
                    style="height: 150px; width: 150px; border-radius: 50%; display: block; margin: 0 auto; border: 5px solid #e9934d;"
                    alt="main_logo">

                <h4 class="text-black font-weight-bolder text-center mt-0 mb-0" style="margin-bottom: 50px !important">
                </h4>

                <div class="row">

                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            {{-- <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="shadow-primary border-radius-lg py-3 pe-1"
                                    style="background-color: #ffe44c !important">
                                    <h4 class="text-black font-weight-bolder text-center mt-2 mb-0">Login</h4>
                                    <h4 class="text-black  text-center text-sm mt-2 mb-0">A few more clicks to
                                        login to your account.</h4>
                                </div>
                            </div> --}}
                            <div class="card-body">
                                <form role="form" class="text-start" action="" method="post">
                                    @csrf

                                    <h5 class="text-white" style="margin-bottom: 20px;">Login</h5>

                                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                    <!-- Validation Errors -->
                                    <x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />

                                    @if (Session::has('error'))
                                    <div id="mydiv" class="rounded-md mt-2 px-5 lg:mx-20 py-4 mb-2 bg-white text-black"><i
                                            class="fa fa-exclamation-circle text-theme-6 mr-2"></i>{{ session('error') }}</strong></div>
                                    @endif


                                    <div class="input-group input-group-outline mb-3">
                                        {{-- <label class="form-label">Email</label> --}}
                                        <input name="email" type="email" class="form-control"
                                            placeholder="Enter your email">
                                    </div>


                                    <div class="input-group input-group-outline mb-3">
                                        {{-- <label class="form-label">Password</label> --}}
                                        <input name="password" type="password" class="form-control"
                                            placeholder="Enter your password">
                                    </div>

                                    {{-- <div class="form-group row">
                                        <div class="col-md-9 offset-md-4">
                                            <div class="checkbox mr-0 my-0">
                                                <label>
                                                    <a href="{{ route('forget.password.get') }}">Forgot Password?</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="text-center">
                                        {{-- <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button> --}}
                                        <button type="submit" class="btn text-black w-100 my-0 mb-2"
                                            style="background-color: #ffe44c !important">LOGIN</button>

                                        <br>
                                     

                                    </div>
                                    <p style="margin-top: 10px; margin-bottom:-10px;"> <a href="{{ route('register') }}"
                                        class="text-white">Create account</a>
                                </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/js/material-dashboard.min.js?v=3.1.0') }}"></script>
</body>

</html>
