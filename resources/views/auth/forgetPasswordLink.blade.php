{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png')}} ">
  <link rel="icon" type="image/png" href="{{ asset('assets/logo.jpg') }}">
  <title>
    Reset Password - Greet Screen
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.css?v=3.1.0')}}" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="bg-gray-200">    
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('{{asset('assets/loginscr.jpg')}}');">
        {{-- <span class="mask bg-gradient-dark opacity-2"></span> --}}
        


      <div class="container my-auto">
       
        <img src="{{ asset('assets/logo.jpg') }}" style="height: 300px; width: 300px; border-radius: 50%; display: block; margin: 0 auto; border: 5px solid #2f3546;" alt="main_logo">

        <h4 class="text-white font-weight-bolder text-center mt-0 mb-0" style="margin-bottom: 50px !important"></h4>

        <div class="row">

          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="shadow-primary border-radius-lg py-3 pe-1" style="background-color: #525d79 !important">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Reset Password</h4>
                  <p class="text-white  text-center text-sm mt-2 mb-3 mx-3">Please enter your details to reset your password.</p>
                </div>
              </div>
              <div class="card-body">
                <form role="form" class="text-start" action="{{ route('submitData') }}" method="post">
                 @csrf    

                 <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="input-group input-group-outline mb-3">
                    {{-- <label class="form-label">Email</label> --}}
                    <input name="email" type="email" class="form-control" placeholder="Enter your email">
                  </div>
                 

                  <div class="input-group input-group-outline mb-3">
                    {{-- <label class="form-label">Password</label> --}}
                    <input name="password" type="password" class="form-control" placeholder="Enter your password">
                  </div>

                  <div class="input-group input-group-outline mb-3">
                    {{-- <label class="form-label">Password</label> --}}
                    <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password">
                  </div>
                  

                  <div class="text-center">
                    {{-- <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button> --}}
                    <button type="submit" class="btn text-white w-100 my-4 mb-2" style="background-color: #525d79 !important">Reset Password</button>

              

                  </div>
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