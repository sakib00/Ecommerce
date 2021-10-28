@extends('layouts.admin')

@section('content')
<div class="container">
    <h4 class="text-center lead">Add a new product</h4>
    <form method="POST" action="{{route('shopowner.store')}}">
    @csrf
        <div class="form-group">
            <label for="name">Shop Name</label>
            <input type="text" class="form-control" id="name" name="shop_name" placeholder="Shop Name">
        </div>
        <div class="form-group">
            <label for="owner_name">Shop Owner Name</label>
            <input type="text" class="form-control" id="owner_name" name="owner_name" placeholder="Shop Owner Name">
        </div>
        <div class="form-group">
            <label for="email">Shop Owner Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email">
        </div>
        <div class="form-group">
            <label for="contact">Shop Owner Contact Number</label>
            <input type="contact" class="form-control" id="contact" name="contact" placeholder="Enter Your Contact Number">
        </div>
        <div class="form-group">
            <label for="password">Shop Owner Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password">
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" placeholder="Shop Location">
        </div>
        <button type="submit" class="btn btn-primary my-3">Add Shop Owner</button>
    </form>
</div>
@endsection