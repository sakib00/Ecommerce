@extends('layouts.auth')

@section('content')

<div class="container">
  
    <div class="card" style="margin:5%;">
        <div class="card-header">
           <h5><strong> Order Number: {{$order->order_id}} </strong></h5>
        </div>


        <div class="card-body">
            <div class="row">

                <div class = "col-md-4 mt-4 card pr-3">
                    <p class="card-text"><strong>Customer Name:</strong> {{$order->name}}</p>
                    <p class="card-text"><strong>Location:</strong> {{$order->location}}</p>
                    <p class="card-text"><strong>Contact:</strong> {{$order->contact}}</p>
                    <p class="card-text"><strong>Total Amount: <span style="color:red;">{{$order->total}} taka (including VAT)</span></strong> </p>
                </div>

                <div class = "col-md-8 mt-4 card pr-3">
                    <table class="table table-striped" >
                        <thead>
                            <tr class="">
                                <th scope="col">Product</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Shop Name</th>
                                <th scope="col">Location</th>
                                </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $row)


                            <tr class="">
                            <td>{{$row->name}}</td>
                            <td>{{$row->quantity}}</td>
                            <td>{{$row->price}}</td>
                            <td>{{$row->shop_name}}</td>
                            <td>{{$row->location}}</td>
                            </tr>


                            @endforeach

                        </tbody>
                    </table>
                </div>


                <div class="d-flex flex-row justify-content-center my-4">	
                    <form action="{{route('deliveryman.deliver')}}" class="align-self-end mx-2" method="POST">
                    @csrf
                        <input type="hidden" id="order_id" name="order_id" value="{{$order->order_id}}">

                        <button type="submit" class="btn btn-sm btn-primary">Deliver</button>
                    </form>
			    </div>

            </div>        
        </div>


    </div>
</div>

@endsection