<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/logo.png') }}">
    <title>
        User Dashboard
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.css?v=3.1.0') }}" rel="stylesheet" />

    {{-- Datatables --}}

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>





    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>

    <style>
        .transparent-button {
            background-color: transparent;
            border: none;
        }
    </style>

    <style>
        input[type=file]::file-selector-button {
            margin-right: 20px;
            border: none;
            background: #e6e6e6;
            padding: 10px 20px;
            border-radius: 10px;
            color: #000000;
            cursor: pointer;
            transition: background .2s ease-in-out;
        }

        input[type=file]::file-selector-button:hover {
            background: #0d45a5;
        }

        .custom-border {
            border: 1px solid rgb(73, 73, 73) !important;
            /* Adjust border thickness if needed */
        }

        /* ======================================Loder CSS============================================= */
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #16191E;
        }

        header {
            background-color: #000000;
            color: #ffffff;
            font-family: 'Poppins', sans-serif;
            text-align: center;
            margin-bottom: 20px;
            letter-spacing: 0.5px;
            padding: 10px 0;
        }

        h3 {
            font-size: 50px;
        }

        h5 {
            font-size: 30px;
        }

        .img-container {
            display: grid;
            grid-template-columns: repeat(auto-fit,
                    minmax(300px, 1fr));
            grid-gap: 30px;
        }

        img {
            width: 100%;
        }

        .content {
            display: none;
        }

        .loader {
            height: 100vh;
            width: 100vw;
            overflow: hidden;
            background-color: #16191e;
            position: absolute;
        }

        .loader>div {
            height: 100px;
            width: 100px;
            border: 15px solid #45474b;
            border-top-color: #2a88e6;
            position: absolute;
            margin: auto;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            border-radius: 50%;
            animation: spin 1.5s infinite linear;
        }

        @keyframes spin {
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body class="g-sidenav-show  bg-gray-200">
    {{-- <aside class="sidenav navbar custom-border navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
        style="background-color: #000000 !important" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="m-2" href="{{ route('dashboard') }}">
                <img src="{{ asset('assets/logo1.jpg') }}"
                    style="height: 80px !important; width: 150px; border-radius: 10%; display: block; margin: 0 auto; border: 5px solid #2f3546;"
                    alt="main_logo">
                <span class="ms-1 font-weight-bold text-white"></span>
            </a>
        </div>
        <br><br>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('list_devices') }}" class="nav-link text-white <?php if ($pagename == 'device' || !isset($pagename)) {
                        echo 'active bg-gradient-primary';
                    } ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">laptop</i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>


                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <li class="nav-item">
                        <a class="nav-link text-white" href=""
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">logout</i>
                            </div>
                            <button class="transparent-button text-white" type="submit"><span
                                    class="nav-link-text ms-1">Logout</span></button>
                        </a>

                    </li>
                </form>
            </ul>
        </div>

        @if (Session::has('login_message'))
            <div id="mydiv" class="rounded-md px-5 mt-2 lg:mx-20 py-4 mb-2 bg-theme-18 text-theme-9"><i
                    class="fa fa-check text-theme-9 mr-2"></i>Your Account has been <strong>Login Successfully!</strong>
            </div>
        @endif
        @if (Session::has('delete_message'))
            <div id="mydiv" class="rounded-md px-5 lg:mx-20 py-4 mb-2 mt-2 bg-theme-31 text-theme-6"><i
                    class="fa fa-times text-theme-6 mr-2"></i> Record has been Deleted <strong>Successfully!</strong>
            </div>
        @endif
        @if (Session::has('update_message'))
            <div id="mydiv" class="rounded-md mt-2 px-5 lg:mx-20 py-4 mb-2 bg-theme-17 text-theme-11"><i
                    class="fa fa-edit text-theme-11 mr-2"></i> Record has been Updated <strong>Successfully!</strong>
            </div>
        @endif
        @if (Session::has('add_message'))
            <div id="mydiv" class="rounded-md mt-2 px-5 lg:mx-20 py-4 mb-2 text-white bg-gradient-primary"><i
                    class="fa fa-check text-theme-9 mr-2"></i>New Record has been Added <strong>Successfully!</strong>
            </div>
        @endif
        @if (Session::has('un_suspend'))
            <div id="mydiv" class="rounded-md mt-2 px-5 lg:mx-20 py-4 mb-2 bg-theme-18 text-theme-9"><i
                    class="fa fa-check text-theme-9 mr-2"></i>You Have Un-Suspend This
                User<strong>Successfully!</strong>
            </div>
        @endif
        @if (Session::has('cd'))
            <div id="mydiv" class="rounded-md mt-2 px-5 lg:mx-20 py-4 mb-2 bg-theme-42 text-theme-5"><i
                    class="fa fa-check text-theme-5 mr-2"></i>You Have Change CD Data <strong>Successfully!</strong>
            </div>
        @endif
        @if (Session::has('cd_message'))
            <div id="mydiv" class="rounded-md mt-2 px-5 lg:mx-20 py-4 mb-2 bg-theme-31 text-theme-6"><i
                    class="fa fa-exclamation-circle text-theme-6 mr-2"></i>You Have to upload CD <strong>First!</strong>
            </div>
        @endif
        @if (Session::has('status'))
            <div id="mydiv" class="rounded-md mt-2 px-5 lg:mx-20 py-4 mb-2 bg-theme-42 text-theme-5"><i
                    class="fa fa-check text-theme-5 mr-2"></i>You Have Changed User Status
                <strong>Successfully!</strong>
            </div>
        @endif
        @if (Session::has('resolved'))
            <div id="mydiv" class="rounded-md mt-2 px-5 lg:mx-20 py-4 mb-2 bg-theme-42 text-theme-5"><i
                    class="fa fa-check text-theme-5 mr-2"></i>You Have Removed Error <strong>Successfully!</strong>
            </div>
        @endif
        @if (Session::has('error_message'))
            <div id="mydiv" class="rounded-md mt-2 px-5 lg:mx-20 py-4 mb-2 bg-theme-31 text-theme-6"><i
                    class="fa fa-exclamation-circle text-theme-6 mr-2"></i> You have Suspend this User
                <strong>Successfully!</strong>
            </div>
        @endif
        @if (Session::has('error'))
            <div id="mydiv" class="rounded-md mt-2 px-5 lg:mx-20 py-4 mb-2 bg-theme-31 text-theme-6"><i
                    class="fa fa-exclamation-circle text-theme-6 mr-2"></i>{{ session('error') }}</strong></div>
        @endif

        <script>
            setTimeout(function() {

                $('#mydiv').fadeOut('fast');
            }, 5000);

            function divout() {
                $('#mydiv').fadeOut('fast');
            }
        </script>

    </aside> --}}
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    </ol>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                    </div>
                    <ul class="navbar-nav  justify-content-end">

                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->


        <!-- Navbar -->
        {{-- <nav class="navbar navbar-main  px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">

       
    </div>
  </nav> --}}
        <!-- End Navbar -->
