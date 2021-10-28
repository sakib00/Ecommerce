@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <h4 class="admin-heading"><i class="fas fa-pills"></i> Shop Owners</h4>
        <div class="admin-add-btn"><a href="{{route('shopowner.create')}}"><button class="btn btn-primary ">Add New Shop Owner</button></a></div>
    </div>


    <table class="mt-4 table table-striped table-hover">
        <thead class="thead-dark">
            <tr class="">
            <th scope="col">Shop ID</th>
            <th scope="col">User ID</th>
            <th scope="col">Location</th>
            <th scope="col">Shop Name</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shop_owners as $shop_owner)
                <tr>
                <th scope="row">{{$shop_owner->shop_id}}</th>
                <td>{{$shop_owner->user_id}}</td>
                <td>{{$shop_owner->location}}</td>
                <td>{{$shop_owner->shop_name}}</td>
                <td>
                <form action="{{route('shopowner.edit', $shop_owner->shop_id)}}" method="GET">
                <button type="submit" class="btn btn-info"><i class="far fa-edit"></i></button>
                </form>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    </div>
</div>
@endsection