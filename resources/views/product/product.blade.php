@extends('layouts.app')

@section('content')
<div class="container mt-3">

    <div class="row">
        <div class="col-md-3 mt-4 card prod-img-section pr-3">
            <div class="card-body">
                
                <img class="" src="{{asset('images/1.jpg')}}" alt="" width="100%">
            </div>

        </div>
        <div class="col-md-6 mt-4 card prod-details-section">
            
            <div class="card-body">
                <h4><strong>{{$product->name}}</strong></h4>
                <p>
                    
                </p>
                <div class="price">
                    <p>৳ {{$product->price}} (per unit)</p>
                </div>

                <div class="product_details">
                    <h6><strong>Product Details</strong></h6>
                    <p class="card-text">{{$product->description}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-4">
            <div class="card cart-section">
                <div class="card-body">
                    <h4><strong>In Stock</strong></h4>
                    <p class="qua-price mb-2">Quantity and Price</p>
                        
                        <form action="{{route('cart.store')}}" method="POST">
                        @csrf
                            <input type="hidden" name="id" value="{{$product->product_id}}">
                            <input type="hidden" name="price" value="{{$product->price}}">
                            <input type="hidden" name="name" value="{{$product->name}}">
                            <div class="input-group mb-3">
                                <select class="custom-select" id="prod-select" name="qty">
                                    <option value="1" selected>1 - ৳{{$product->price * 1}}</option>
                                    <option value="2">2 - ৳{{$product->price * 2}}</option>
                                    <option value="3">3 - ৳{{$product->price * 3}}</option>
                                    <option value="4">4 - ৳{{$product->price * 4}}</option>
                                    <option value="5">5 - ৳{{$product->price * 5}}</option>
                                    <option value="6">6 - ৳{{$product->price * 6}}</option>
                                    <option value="7">7 - ৳{{$product->price * 7}}</option>
                                </select>
                            </div>
                        
                            <button type="submit" class="btn btn-sm btn-primary">ADD TO CART</button>
                        </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
