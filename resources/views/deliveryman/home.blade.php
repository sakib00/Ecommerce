@extends('layouts.auth')

@section('content')

<div class="container">

        <div class="my-5">
            <h1><strong>Hello, {{ Auth::user()->name }}</strong></h1>
        </div>

    
    @if (count($orders_pending) > 0)


        <div class="">
            <h2 class="heading text-center mb-4">Available Orders</h2>
        </div>

        @foreach($orders_pending->chunk(3) as $chunk)
            <div class="row text-center">
                @foreach ($chunk as $order)

                <div class="col-md-4">
                    <div class="card">
                    <div class="card-body">
                        <a href="{{route('deliveryman.show_order',$order->order_id)}}"><h4 class="card-title">Order Number:  {{$order->order_id}}</h4></a>
                        <p class="card-text">Customer Location: {{$order->location}}</p>
                        <p class="card-text">Total Amount: Taka {{$order->total}}</p>

                        <form action="{{route('deliveryman.show_order', $order->order_id)}}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-block btn-primary">Take Order</button>
                        </form>   
                    </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endforeach

        @endif


        @if (count($orders_completed) > 0)


        <div class="">
        <h2 class="heading text-center my-4">Completed Orders</h2>
        </div>

        @foreach($orders_completed->chunk(3) as $chunk)
            <div class="row text-center">
                @foreach ($chunk as $order)

                <div class="col-md-4">
                    <div class="card">
                    <div class="card-body">
                        <a href="{{route('deliveryman.show_order',$order->order_id)}}"><h4 class="card-title">Order Number:  {{$order->order_id}}</h4></a>
                        <p class="card-text">Customer Location: {{$order->location}}</p>
                        <p class="card-text">Total Amount: Taka {{$order->total}}</p>
                    </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endforeach
        @endif






</div>

@endsection