<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <h1>Forget Password Email</h1>

    You can reset password from bellow link:
    {{-- <a href="{{ route('reset.password.get', [ 'token' => $token ]) }}">Reset Password</a>
     --}}
 

     <a href="{{ route('resetForm', ['token' => $token]) }}">Reset Password</a>

     <?php 
    //  dd($token);
    ?>

</body>

</html>
