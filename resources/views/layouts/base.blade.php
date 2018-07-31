<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ojt Notebook</title>
    <link rel="stylesheet" href="{{asset('dist/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap.css')}}">
</head>

<body>
    <div class="container-fluid">
      
        @yield('content')
    </div>
    <!-- /container -->

    <script src="{{asset('dist/js/jquery3.min.js')}}">
    <script src="{{asset('dist/js/bootstrap.min.js')}}">
</body>

</html>
