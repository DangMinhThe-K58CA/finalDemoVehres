<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Style -->
    @include('admins.layouts.adminStyle')
</head>
<body>
    <div id="wrapper">
        <!-- Navbar top and left -->
        @include('admins.layouts.navbar')
        <!-- content -->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="content-main">
                <!--banner-->
                <div class="banner">
                    <h2>
                    <a href="{{ route('home') }}">Home</a>
                    <i class="fa fa-angle-right"></i>
                    <span>@yield('tag')</span>
                    </h2>
                </div>
                <!--//banner-->
                <!-- content -->
                <div class="grid-form">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts-->
    @include('admins.layouts.adminScript')

</body>
</html>

