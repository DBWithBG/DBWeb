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
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '623663577980945',
            xfbml      : true,
            version    : 'v3.0'
        });
        FB.AppEvents.logPageView();
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<!--<div class="over-loader loader-live">
    <div class="loader">
        <div class="loader-item style4">
            <div class="cube1"></div>
            <div class="cube2"></div>
        </div>
    </div>
</div>
-->
<div class="wrapper-boxed">
    <div class="site-wrapper">
        @include('customer.layouts.topBarre')

        <!--end loading-->
        @yield('content')

    </div>
</div>

<!-- Scripts -->
@include('customer.layouts.scripts')
@yield('custom-scripts')
</body>

</html>
