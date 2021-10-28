@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between">
        <h4 class="admin-heading"><i class="fas fa-pills"></i> Customers</h4>
       <div class="admin-add-btn"><a href="{{route('customer.create')}}"><button class="btn btn-primary ">Add New Customer</button></a></div>

    </div>


    <table class="mt-4 table table-striped table-hover">
        <thead class="thead-dark">
            <tr class="">
            <th scope="col">ID</th>
            <th scope="col">User ID</th>
            <th scope="col">Name</th>
            <th scope="col">Location</th>
            <th scope="col">Address</th>
            <th scope="col">Contact</th>
            <th scope="col">Added</th>
            <th scope="col">Updated</th>
            <th scope="col" colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr>
                <th scope="row">{{$customer->customer_id}}</th>
                <td>{{$customer->user_id}}</td>
                <td>{{$customer->name}}</td>
                <td>{{$customer->location}}</td>
                <td>{{$customer->address}}</td>
                <td>{{$customer->contact}}</td>
                <td>{{$customer->created_at}}</td>
                <td>{{$customer->updated_at}}</td>
                <td>
                <form action="{{route('customer.edit', $customer->customer_id)}}" method="GET">
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