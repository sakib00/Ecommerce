@extends('layouts.app')

@section('content')
<div class="cover-home" style="background-image: url({{asset('images/cover.jpg')}});">

</div>

<div class="container pt-5">

<h1 class="heading text-center py-4">Featured Products</h1>


        <!-- <div class="row">
            <div class="col">
                <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                    <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid" src="{{asset('images/cover.jpg')}}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="{{asset('images/cover.png')}}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="{{asset('images/cover.png')}}" alt="Third slide">
                    </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                    </a>
                </div>    
            </div>
        </div> -->

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
        <a class="btn btn-block btn-warning" href="{{route('product.index')}}">View All Products</a>
        </div>



@endsection