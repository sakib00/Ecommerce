@extends('layouts.admin')

@section('content')
<div class="container">
    <h4 class="text-center lead">Edit deliveryman</h4>
    <form method="POST" action="{{route('deliveryman.update', ['id' => $deliveryman->dman_id])}}">
    {{ method_field('PUT') }}
    @csrf
        <div class="form-row">
            <div class="col">
            <input type="text" name="user_id" class="form-control" placeholder="{{$deliveryman->user_id}}">
            </div>
            <div class="col">
            <input type="text" name="name" class="form-control" placeholder="{{$deliveryman->name}}">
            </div>
            <div class="col">
            <input type="text" name="location" class="form-control" placeholder="{{$deliveryman->location}}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary my-3">UPDATE</button>
    </form>
</div>
@endsection