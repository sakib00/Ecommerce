@extends('layouts.admin')

@section('content')
<div class="container">
    <h4 class="text-center lead">Edit customer</h4>
    <form method="POST" action="{{route('customer.update', ['id' => $customer->customer_id])}}">
    {{ method_field('PUT') }}
    @csrf
        <div class="form-row">
            <div class="col">
            <input type="text" name="user_id" class="form-control" placeholder="{{$customer->user_id}}">
            </div>
            <div class="col">
            <input type="text" name="name" class="form-control" placeholder="{{$customer->name}}">
            </div>
            <div class="col">
            <input type="text" name="location" class="form-control" placeholder="{{$customer->location}}">
            </div>
            <div class="col">
            <input type="text" name="contact" class="form-control" placeholder="{{$customer->conact}}">
            </div>
            <div class="col">
        </div>
        <button type="submit" class="btn btn-primary my-3">UPDATE</button>
    </form>
</div>
@endsection