<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ojt Notebook</title>
    <link rel="stylesheet" href="{{asset('dist/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap.css')}}">
    
    
    <script src="{{asset('dist/js/jquery3.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/js/tether.js"></script>
    <script src="{{asset('dist/js/bootstrap.js')}}"></script>
    
</head>

<body>
    <div class="container-fluid">
      
        @yield('content')
    </div>
    <!-- /container -->
        @yield('script')
</body>

</html>
