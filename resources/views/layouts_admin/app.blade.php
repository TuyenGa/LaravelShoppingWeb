
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="{{asset('bower_components/metisMenu/dist/metisMenu.min.css')}}" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="{{asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{asset('bower_components/datatables-responsive/css/dataTables.responsive.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div id="app">
    @include('pratials.nav_admin')
    <div class="container">
        @yield('content')
    </div>
</div>

<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{asset('bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

<script src="{{asset('bower_components/DataTables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')}}"></script>
</body>
</html>
