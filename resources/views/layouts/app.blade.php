<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Vendor styles -->
        <link rel="stylesheet" href="{{ asset("vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css") }}">
        <link rel="stylesheet" href="{{ asset("vendors/bower_components/animate.css/animate.min.css") }}">
        <link rel="stylesheet" href="{{ asset("vendors/bower_components/jquery.scrollbar/jquery.scrollbar.css") }}">

        <!-- App styles -->
        <link rel="stylesheet" href="{{ asset("css/theme.min.css") }}">
    </head>
    <body data-ma-theme="teal">
        <div id="app">
            <main class="main">
                <div class="page-loader">
                    <div class="page-loader__spinner">
                        <svg viewBox="25 25 50 50">
                            <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                        </svg>
                    </div>
                </div>

                <navbar-component
                        p-url-logo-image="{{ asset('img/logo.png') }}"
                        p-url-logout="{{ route("logout") }}">
                </navbar-component>

                <sidebar-layout-component
                        p-url-profile="#"
                        :p-user="{{ Auth::user()->toJson() }}"
                        :p-menus="{{ $oMenus->toJson() }}">
                </sidebar-layout-component>

                <section class="content">
                    @yield('content')

                    <footer class="footer hidden-xs-down">
                        <p>© Material Admin Responsive. All rights reserved.</p>
                    </footer>
                </section>
            </main>

            <if-ie-component></if-ie-component>
        </div>

        <!-- Javascript -->
        <!-- Vendors -->
        <script src="{{ asset("vendors/bower_components/jquery/dist/jquery.min.js") }}"></script>
        <script src="{{ asset("vendors/bower_components/popper.js/dist/umd/popper.min.js") }}"></script>
        <script src="{{ asset("vendors/bower_components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
        <script src="{{ asset("vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js") }}"></script>
        <script src="{{ asset("vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js") }}"></script>
        <script src="{{ asset("js/theme.min.js") }}"></script>

        <!-- App functions and actions -->
        <script src="{{ asset("js/app.js") }}"></script>
    </body>
</html>
