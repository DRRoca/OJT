<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MYND Notebook</title>

    <!-- Fonts -->
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }
        .fa-btn {
            margin-right: 6px;
        }
        .center {
          margin: 0 auto;
        }
        .form {
          max-width: 500px;
        }
        nav {
          font-weight: 100;
          padding: 0 10px 10px 10px;
          color: #fff
        }
    </style>
</head>
<body id="app-layout">
    <div class="navbar-fixed">
      <nav style="background-color:#9966ff;">
    <ul id="authdropdown" class="dropdown-content darken-4 learn-nav">
      <li><a href="{{ url('/logout') }}">Logout</a></li>
    </ul>
        <div class="nav-wrapper">
          <div class="container">
            <a href="{{ url('/') }}" class="flow-text">Mynd Notebook</a>
           <ul class="right hide-on-med-and-down">
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
            @else
                <li>
                    <a class="dropdown-button" data-activates="authdropdown" href="#">
                        {{ Auth::user()->name }}
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
            @endif
           </ul>

           <ul id="nav-mobile" class="side-nav">
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
            @else
                <li><a href="{{ url('/logout') }}">Logout</a></li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
    </div>

    @yield('content')

    <!-- JavaScripts -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script>
      $(document).ready(function () {
        $(".dropdown-button").dropdown();
        $(".button-collapse").sideNav();
      });
    </script>
</body>
</html>