@extends('layouts.admin')

@section('content')
<div class="container">
    <h4 class="text-center lead">Add a new delivery man</h4>
    <form method="POST" action="{{route('deliveryman.store')}}">
    @csrf
        <div class="form-group">
            <label for="name">Delivery Man Name</label>
            <input type="text" class="form-control" id="name" name="dman_name" placeholder="Delivery Man Name">
        </div>
        <div class="form-group">
            <label for="email">Delivery Man Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email">
        </div>
        <div class="form-group">
            <label for="contact">Delivery Man Number</label>
            <input type="contact" class="form-control" id="contact" name="contact" placeholder="Enter Your Contact Number">
        </div>
        <div class="form-group">
            <label for="password">Delivery Man Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password">
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" placeholder="Location">
        </div>
        <button type="submit" class="btn btn-primary my-3">Add Delivery Man</button>
    </form>
</div>
@endsection