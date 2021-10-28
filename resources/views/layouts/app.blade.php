<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/813659588a.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm sticky-top justify-content-center">
            <div class="container">
            
            
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="{{route('home')}}">BHAI BHAI STORE</a>
                <!-- {{ config('app.name', 'BHAI BHAI STORE') }} -->
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    
                <form class="searchbar my-2 my-lg-0 ml-auto" action="{{route('search')}}" method="POST">
                    @csrf
                        <div class="input-group">
                                
                                <input name="term" type="text" class="form-control" width="900" placeholder="Search for groceries" aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-warning flex-grow" type="submit"><i class="fas fa-search" ></i></button>
                                </div>
                        </div>
                    </form>
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                    </ul>
                </div>
            
            
            </div>
        </nav>








        <main class="pb-5">
            @yield('content')
        </main>
    </div>
     <!-- Footer -->
  <footer class="footer py-3 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Bhaibhai store 2020</p>
    </div>
    <!-- /.container -->
  </footer>
</body>
</html>