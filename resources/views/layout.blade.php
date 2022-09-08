<!DOCTYPE html>
<html>
<head>
<title>@yield('title')</title>

<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
</head>
<body>

<div class="container py-5">
    @yield('content')
</div>

<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/jquery-3.6.1.js')}}"></script>

</body>
</html>
