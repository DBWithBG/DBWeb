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
        @include('admin.layouts.head')

    </head>
    <body>
        <div id="app">
            <div class="wrapper">

                @yield('content')

            </div>
        </div>

    <!-- Scripts -->
    @include('admin.layouts.scripts')
    @yield('custom-scripts')
    </body>

</html>
