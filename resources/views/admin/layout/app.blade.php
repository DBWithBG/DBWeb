<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" style="font-size: 16px">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>IN'BO</title>

    <!-- Styles -->
    @include('inbo.layout.head')

    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
</head>
<body>
<div id="app">
    @include('inbo.layout.topBarre')
    @yield('content')
</div>
@include('inbo.layout.footer')

<!-- Scripts -->
@include('inbo.layout.scripts')

<!--<script src="{{ asset('js/app.js') }}"></script>-->

</body>

</html>
