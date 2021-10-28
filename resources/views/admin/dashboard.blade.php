@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="admin-count col-md-3">
            <div class="card ">
                <div class="card-body d-flex justify-content-between">
                <i class="fas fa-capsules"></i>
                <p>12</p>
                </div>
            </div>
        </div>
        <div class="admin-count col-md-3">
            <div class="card ">
                <div class="card-body d-flex justify-content-between">
                <i class="fas fa-user-md"></i>
                <p>1</p>
                </div>
            </div>
        </div>
        <div class="admin-count col-md-3">
            <div class="card ">
                <div class="card-body d-flex justify-content-between">
                <i class="fas fa-chart-line"></i>
                <p>1</p>
                </div>
            </div>
        </div>
        <div class="admin-count col-md-3">
            <div class="card ">
                <div class="card-body d-flex justify-content-between">
                <i class="fas fa-shopping-cart"></i>
                <p>1</p>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection