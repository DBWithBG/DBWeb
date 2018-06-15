<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" style="font-size: 16px">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DELIVERBAG</title>

    <!-- Styles -->
    @include('customer.layouts.head')

</head>
<body>
<div class="over-loader loader-live">
    <div class="loader">
        <div class="loader-item style4">
            <div class="cube1"></div>
            <div class="cube2"></div>
        </div>
    </div>
</div>
<div class="wrapper-boxed">
    <div class="site-wrapper">

        <!--end loading-->
        @yield('content')

    </div>
</div>

<!-- Scripts -->
@include('customer.layouts.scripts')
@yield('custom-scripts')
</body>

</html>
