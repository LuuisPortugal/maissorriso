<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{ asset("vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css") }}">
    <link rel="stylesheet" href="{{ asset("vendors/bower_components/animate.css/animate.min.css") }}">
    <link rel="stylesheet" href="{{ asset("vendors/bower_components/sweetalert2/dist/sweetalert2.min.css") }}">

    <!-- App styles -->
    <link rel="stylesheet" href="{{ asset("css/theme.min.css") }}">
</head>

<body data-ma-theme="teal">
    <div id="app" class="login">
        <!-- Login -->
        <login-auth-component p-url-login="{{ route('login') }}"></login-auth-component>

        <!-- Register -->
        <register-auth-component p-url-register="{{ route('register') }}"></register-auth-component>

        <!-- Forgot Password -->
        <forgot-password-auth-component p-url-forgot-password="{{ route('password.email') }}"></forgot-password-auth-component>
    </div>

    <!-- Javascript -->
    <!-- Vendors -->
    <script src="{{ asset("vendors/bower_components/jquery/dist/jquery.min.js") }}"></script>
    <script src="{{ asset("vendors/bower_components/popper.js/dist/umd/popper.min.js") }}"></script>
    <script src="{{ asset("vendors/bower_components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("vendors/bower_components/sweetalert2/dist/sweetalert2.min.js") }}"></script>
    <script src="{{ asset("js/theme.min.js") }}"></script>

    <!-- App functions and actions -->
    <script src="{{ asset("js/app.js") }}"></script>
</body>

</html>