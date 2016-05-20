<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Indique</title>
    <link href="{{  url('assets/css/reset.css') }}" rel='stylesheet' type='text/css'>

    <!-- todo versoes locais e atualizadas. reset css, html5 boilerplate -->
    <!-- Fonts -->
    <link href="{{  url('assets/css/font-awesome/css/font-awesome.min.css') }}" rel='stylesheet'
          type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,600,700' rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="{{  url('assets/css/bootstrap.css') }}" rel='stylesheet'
          type='text/css'>

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">

{{--barra de navegacao--}}
@include('partials.nav')

{{--conteudo--}}
@yield('content')

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>--}}
{{--<script src="{{  url('assets/js/jquery-2.1.4.js') }}"></script>--}}
{{--<script src="{{  url('assets/js/jquery-1.10.2.js') }}"></script>--}}
<script src="{{  url('assets/js/bootstrap.min.js') }}"></script>
<script src="{{  url('assets/js/indicacao.js') }}"></script>
<script src="{{  url('assets/js/usuario.js') }}"></script>
<script src="{{  url('assets/js/modernizr.js') }}"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
