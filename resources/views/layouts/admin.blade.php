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
    <script src="https://kit.fontawesome.com/813659588a.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <div class="row">
            <div class="sidebar d-none d-md-block bg-dark">
            
                <div class="logo" style="margin:10%; padding-left:10%;">
                    <a class="navbar-brand text-center" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="sidebar-sticky">
                    <ul class="nav flex-column">>
                        <li class="nav-item sidebar-item"><a class="nav-link active" href="{{ url('/admin/customers') }}"><i class="fas fa-user-friends"></i>Customers</a></li>
                        <li class="nav-item sidebar-item"><a class="nav-link" href="{{ url('/admin/products') }}">Products</a></li>
                        <li class="nav-item "><a class="nav-link active" href="{{ url('/admin/shopowners') }}">Shopowners</a></li>
                        <li class="nav-item "><a class="nav-link active" href="{{ url('/admin/deliverymen') }}">Delivery Men</a></li>
                    </ul>
                </div>
            
            </div>


            <main class="col px-0 py-5">

                @yield('content')
    
            </main>

        </div>
    </div>
</body>
</html>
