<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Apriori Referensi Pembelian Stok">
    <meta name="author" content="Nur Fitrina">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body class="app header-fixed">
<div class="app-body">
    <main class="main">
        @yield('content')
    </main>
</div>

<footer class="app-footer">
    <a href="#"></a> © 2017.
    <span class="float-right">Powered by <a href="http://coreui.io">CoreUI</a></span>
</footer>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/tether.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
{{--<script src="{{ asset('js/pace.min.js') }}"></script>--}}
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/views/main.js') }}"></script>
</body>
</html>