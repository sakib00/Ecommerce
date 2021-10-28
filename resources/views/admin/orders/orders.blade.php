@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between">
        <h4 class="admin-heading"><i class="fas fa-shopping-cart"></i>Orders</h4>
    </div>


    <table class="mt-4 table table-striped table-hover">
        <thead class="thead-dark">
            <tr class="">
            <th scope="col">Order ID</th>
            <th scope="col">Customer</th>
            <th scope="col">Total </th>
            <th scope="col">Payment Method</th>
            <th scope="col">Ordered On</th>
            <th scope="col">Order Status</th>
            <th scope="col">Updated On</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                <th scope="row">{{$order->order_id}}</th>
                <td>{{$order->name}}</td>
                <td>{{$order->total}}</td>
                <td>{{$order->pay_method}}</td>
                <td>{{$order->created_at}}</td>
                <td>{{$order->order_status}}</td>
                <td>{{$order->updated_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    </div>
</div>
@endsection