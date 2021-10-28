@extends('layouts.app')

@section('content')
<div class="container mt-4">

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


    <h1 class="heading text-center py-4">The largest inventory in the country!</h1>

    @foreach($products->chunk(4) as $chunk)
        <div class="row text-center">
            @foreach ($chunk as $product)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                <a href="#"><img class="card-img-top" src="{{asset('images/' .  $product->image)}}" alt="" width="100%" height="100%"></a>
                <div class="card-body">
                    <h4 class="card-title">
                    <a href="{{route('product.show',$product->product_id)}}">{{$product->name}}</a>
                    </h4>
                    <h5>${{$product->price}}</h5>
                    <p class="card-text">{{$product->description}}</p>
                    <form action="{{route('cart.store')}}" method="POST">
                        @csrf
                        
                        <input type="hidden" name="id" value="{{$product->product_id}}">
                        <input type="hidden" name="price" value="{{$product->price}}">
                        <input type="hidden" name="name" value="{{$product->name}}">
                        <input type="hidden" name="qty" value="1">
                        <button type="submit" class="btn btn-block btn-primary">Add to Cart</button>
                    </form>                                    
                                    
                
                </div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach   




</div>
@endsection