@extends('layouts.admin')

@section('content')
<div class="container">
    <h4 class="text-center lead">Add a new product</h4>
    <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Product Name">
        </div>
        <div class="form-group">
            <label for="shop_id">Example select</label>
            <select class="form-control" id="shop_id" name="shop_id">
            @foreach($shop_owners as $shop_owner)
                <option value="{{$shop_owner->shop_id}}">{{$shop_owner->shop_name}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image">
                <label class="custom-file-label" for="image">Choose Image</label>
            </div>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="Price">
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="text" class="form-control" id="stock" name="stock" placeholder="Stock">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary my-3">Add Product</button>
    </form>
</div>
@endsection