@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row my-5">
        <div class="mr-auto">
            <h3 class=""><strong>{{ $shop->shop_name }}</strong></h3>
        </div>
        <div class="ml-auto">
            <a href="{{route('shopowner.pcreate')}}"><button class="btn btn-primary ">Add New Product</button></a>
        </div>
    </div>

    @foreach($products->chunk(3) as $chunk)
    <div class="row">
        @foreach ($chunk as $product)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
            <a href="#"><img class="card-img-top" src="{{asset('images/' .  $product->image)}}" alt="" width="100%" height="100%"></a>
            <div class="card-body">
                <h4 class="card-title">
                {{$product->name}}
                </h4>
                <h5>${{$product->price}}</h5>
                <p class="card-text">{{$product->description}}</p>
                <p class="card-text">Stock available: {{$product->stock}}</p>

                
                <form action="{{route('shopowner.pedit', $product->product_id)}}" method="GET">
                <button type="submit" class="btn btn-outline-success btn-block my-3"><i class="far fa-edit"></i>  EDIT</button>
                </form>
                
                <form action="{{route('shopowner.pdestroy', $product->product_id)}}" method="GET">
                <button type="submit" class="btn btn-outline-danger btn-block my-3"><i class="fas fa-dumpster"></i>  DELETE</button>
                </form>
                   
            
            </div>
            
            </div>
        </div>
        @endforeach
    </div>
    @endforeach      
</div>


@endsection