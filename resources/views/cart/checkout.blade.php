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
            <div class="container mt-3">

                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                <h4 class="page-heading text-center">Checkout</h4>

                <div class="container">
                    <div class="row justify-content-md-center">
                        <img src="{{asset('images/bkash-payment.gif')}}" alt="">
                    </div>
                    <div class="row justify-content-md-center">
                        <p class="amount">{{$amount}}</p><br>
                    </div>
                    <div class="row justify-content-md-center">
                        <p class="invoice">{{$invoice}}</p><br>
                    </div>
                    <div class="row justify-content-md-center">
                        <button type="button" class="btn btn-primary"  id="bKash_button">Pay With Bkash</button>
                    </div>
                </div>

            </div>
        </main>
    </div>
     <!-- Footer -->
    <footer class="footer py-3 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Bhaibhai store 2020</p>
    </div>
    <!-- /.container -->
    </footer>
    <script src="https://code.jquery.com/jquery-1.8.3.min.js" integrity="sha256-YcbK69I5IXQftf/mYD8WY0/KmEDCv1asggHpJk1trM8=" crossorigin="anonymous"></script>
    <script id = "myScript" src="https://scripts.sandbox.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout-sandbox.js"></script>
    <script>
     var accessToken = '';
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{!! route('token') !!}",
            type: 'POST',
            contentType: 'application/json',
            success: function (data) {
                console.log('got data from token  ..');
                console.log(JSON.stringify(data));
                accessToken = JSON.stringify(data);
            },
            error: function () {
                console.log('error');
            }
        });
        var paymentConfig = {
            createCheckoutURL: "{!! route('createpayment') !!}",
            executeCheckoutURL: "{!! route('executepayment') !!}"
        };
        var paymentRequest;
        paymentRequest = {amount: $('.amount').text(), intent: 'sale', invoice: $('.invoice').text()};
        console.log(JSON.stringify(paymentRequest));
        bKash.init({
            paymentMode: 'checkout',
            paymentRequest: paymentRequest,
            createRequest: function (request) {
                console.log('=> createRequest (request) :: ');
                console.log(request);
                $.ajax({
                    url: paymentConfig.createCheckoutURL + "?amount=" + paymentRequest.amount + "&invoice=" + paymentRequest.invoice,
                    type: 'GET',
                    contentType: 'application/json',
                    success: function (data) {
                        console.log('got data from create  ..');
                        console.log('data ::=>');
                        console.log(JSON.stringify(data));
                        var obj = JSON.parse(data);
                        if (data && obj.paymentID != null) {
                            paymentID = obj.paymentID;
                            bKash.create().onSuccess(obj);
                        }
                        else {
                            console.log('error');
                            bKash.create().onError();
                        }
                    },
                    error: function () {
                        console.log('error');
                        bKash.create().onError();
                    }
                });
            },
            executeRequestOnAuthorization: function () {
                console.log('=> executeRequestOnAuthorization');
                $.ajax({
                    url: paymentConfig.executeCheckoutURL + "?paymentID=" + paymentID,
                    type: 'GET',
                    contentType: 'application/json',
                    success: function (data) {
                        console.log('got data from execute  ..');
                        console.log('data ::=>');
                        console.log(JSON.stringify(data));
                        data = JSON.parse(data);
                        if (data && data.paymentID != null) {
                            alert('[SUCCESS] data : ' + JSON.stringify(data));
                            window.location.href = "{!! route('home') !!}";
                        }
                        else {
                            bKash.execute().onError();
                        }
                    },
                    error: function () {
                        bKash.execute().onError();
                    }
                });
            }
        });
        console.log("Right after init ");
    });
    function callReconfigure(val) {
        bKash.reconfigure(val);
    }
    function clickPayButton() {
        $("#bKash_button").trigger('click');
    }
    </script>
</body>
</html>

