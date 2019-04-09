<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <base href="{{ URL::asset('/') }}" traget="_top">
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css' )}}">
    <link rel="stylesheet" href="{{ url('css/ohmed.style.css' )}}">

    <script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03"
            aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">KFZ-APP</a>
        <li class="nav-item active">
            <a class="nav-link" href="/serializer">Serializer<span class="sr-only">(current)</span></a>
        </li>
    </nav>
    <!-- 
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/contact">Contact</a></li>
        <li><a href="/about">About Us</a></li>
        <li><a href="/projects">Projects</a></li>
        <li><a href="/projects/create">Create</a></li>
    </ul> -->
    @yield('jumbotron')
    <div class="container">
        @yield('content')
    </div>
    <div class="container">
        @yield('err')
    </div>
    <div class="container">
        <hr>
    </div>
    <div class="container">
        @yield('content2')
    </div>
    <script src="{{ url('js/popper.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
</body>

</html>