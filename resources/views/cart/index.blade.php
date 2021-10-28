@extends('layouts.app')

@section('content')
<div class="container mt-3">
<h4 class="page-heading my-3">Your Cart</h4>
@if (session('success'))
<div class="alert alert-success">
	{{ session('success') }}
</div>
@endif
@if (session('error'))
<div class="alert alert-danger">
	{{ session('error') }}
</div>
@endif
	<div class="row">
		<div class="col-md-7">
			<table class="table table-hover table-dark " >
				<thead>
				<tr class="">
					<th scope="col">Product</th>
					<th scope="col">Quantity</th>
					<th scope="col">Price</th>
					<th scope="col">Subtotal</th>
					</tr>
				</thead>
				<tbody>

			@foreach(Cart::content() as $row)


					<tr class="">
					<th>						
						<p>{{$row->name}}</p>
						<p>{{($row->options->has('size') ? $row->options->size : '')}}</p>
					</th>
					<td>{{$row->qty}}</td>
					<td>{{$row->price}}</td>
					<td>{{$row->subtotal}}</td>
					</tr>


			@endforeach


			</tbody>
			
				<tfoot>
					<tr>
						<td colspan="2">&nbsp;</td>
						<td>Subtotal</td>
						<td><?php echo Cart::subtotal(); ?></td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
						<td>Tax</td>
						<td><?php echo Cart::tax(); ?></td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
						<td>Total</td>
						<td><?php echo Cart::total(); ?></td>
					</tr>
				</tfoot>
			</table>



			<div class="d-flex flex-row justify-content-center my-4">	
				<form action="{{route('order.store')}}" class="align-self-start mx-2" method="GET">
					<button type="submit" class="btn btn-sm btn-primary">Proceed To Checkout</button>
				</form>
				<form action="{{route('home')}}" class="align-self-end mx-2" method="GET">
					<button type="submit" class="btn btn-sm btn-primary">Continue Shopping</button>
				</form>
				<form action="{{route('cart.empty')}}" class="align-self-end mx-2" method="GET">
					<button type="submit" class="btn btn-sm btn-danger">Cancel</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection