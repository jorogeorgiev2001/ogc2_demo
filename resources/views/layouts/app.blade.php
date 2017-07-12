<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OGC-2</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{URL::asset('css/datatables.bootstrap.css')}}" rel="stylesheet">


    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}


    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.css">

    <style>

        body {
            font-family: 'Lato';
            font-size: 16px;
        }

        .fa-btn-margin {
            margin-right: 10px;
        }
    </style>
</head>
<body id="app-layout" class="col-sm-12">
    <nav class="navbar navbar-default col-sm-12">
        <div class="container-fluid">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->

                <a class="navbar-brand" href="{{ url('/') }}">
                    Клиенти
                </a>

            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                @if (Auth::guest())
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">

                    </ul>
                @else
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-filter fa-btn-margin" aria-hidden="true"></i>Филтри
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="{{ url('/tasks/dateFilter') }}">Непроверени по дата</a></a></li>
                              <li><a href="#">Page 1-2</a></li>
                              <li><a href="#">Page 1-3</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ url('/task/add') }}"><i class="fa fa-plus-square-o fa-lg fa-btn-margin" aria-hidden="true"></i>Добави клиент</a></li>
                    </ul>
                @endif

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Вход</a></li>
                        <li><a href="{{ url('/register') }}">Регистрация</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out fa-btn-margin"></i>Изход</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

@if (Session::has('flash_message'))
  <div class="alert alert-success">

      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

    {{session('flash_message')}}

  </div>
@endif

    <div class="row">
      @yield('content')
    </div>


    <!-- JavaScripts -->
    <!-- jQuery -->
    <script src="{{URL::asset('js/jquery-1.10.2.min.js')}}"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


<!-- Добавено заради datatables -->
        <!-- DataTables -->
       <script src="{{URL::asset('js/datatables.min.js')}}"></script>
       <script src="{{URL::asset('js/dataTables.bootstrap.min.js')}}"></script>
       <script src="{{URL::asset('js/datetime.js')}}"></script>
       <script src="{{URL::asset('js/handlebars.min.js')}}"></script>

<!-- Скрипт за скриване на съобщенията -->
<script>
  $('div.alert').delay(5000).slideUp(500);
</script>

{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

        @stack('scripts')
</body>
</html>
