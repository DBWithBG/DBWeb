<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" style="font-size: 16px">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Deliverbag est une start-up spécialisée dans la livraison, la consigne et le portage de bagages.
Notre objectif est de faciliter le déplacement de tous les voyageurs en offrant liberté, confort, et sérénité."/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DELIVERBAG</title>

    <!-- Styles -->
    @include('customer.layouts.head')


</head>
<body>

<div id="fb-root"></div>


<div class="wrapper-boxed">
    <div class="site-wrapper" style="min-height: 100vh">
        @include('customer.layouts.topBarre')

        <!--end loading-->
        @yield('content')

        @include('customer.layouts.footer')

    </div>
</div>

<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId            : '320707318542573',
            xfbml            : true,
            version          : 'v3.2'
        });
        FB.AppEvents.logPageView();
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v3.2';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Scripts -->
@include('customer.layouts.scripts')
@yield('custom-scripts')
</body>

</html>
