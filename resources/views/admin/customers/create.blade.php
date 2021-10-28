@extends('layouts.admin')

@section('content')
<div class="container">
    <h4 class="text-center lead">Add a new Customer</h4>
    <form method="POST" action="{{route('customer.store')}}">
    @csrf
        <div class="form-group">
            <label for="name">Customer Name</label>
            <input type="text" class="form-control" id="name" name="customer_name" placeholder="Customer Name">
        </div>
        <div class="form-group">
            <label for="email">Customer Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email">
        </div>
        <div class="form-group">
            <label for="contact">Customer Contact Number</label>
            <input type="contact" class="form-control" id="contact" name="contact" placeholder="Enter Your Contact Number">
        </div>
        <div class="form-group">
            <label for="address">Customer Address</label>
            <input type="address" class="form-control" id="address" name="address" placeholder="Enter Your Address">
        </div>
        <div class="form-group">
            <label for="password">Customer Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password">
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" placeholder="Your Location">
        </div>
        <button type="submit" class="btn btn-primary my-3">Add Customer</button>
    </form>
</div>
@endsection