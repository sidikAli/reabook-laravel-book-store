@extends('layouts.eccomerce.app')
@section('title', 'ReaBook - List Order' )
@section('content')

@include('eccomerce.user.header')
				<div class="col-md-9">
				    <div class="card-header text-white bg-dark text-center">
				      Order
				    </div>
					<div class="card p-5">
						@if(session('success'))
						<div class="alert alert-primary alert-dismissible fade show" role="alert">
						  {{  session('success') }}
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						  </button>
						</div>
						@endif

						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Invoce</th>
									<th>Total</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($orders as $order)
								<tr>
									<td>1</td>
									<td>{{ $order->invoice }}</td>
									<td> @currency($order->total) </td>
									<td>{{ $order->status }}</td>
									<td><a href="{{ route('user.order.show', $order->id) }}" class="btn btn-primary btn-sm">Detail</a ></td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<div class="payment-details">
							<p>Here are the explanation of order statuses:</p>
							<ul>
								<li><span> Waiting For Payment </span>  : The order has been received, but payment has not yet been received.</li>
								<li><span> Pending </span> : The order has been received, but payment has not yet been confirmed.</li>
								<li><span> Confirmed </span> : The order has been confirmed by the seller and is being processed.</li>
								<li><span> Shipped </span> : The order has been shipped and is on its way to the customer.</li>
								<li><span> Delivered </span> : The order has been successfully delivered to the customer.</li>
								<li><span> Cancelled </span> : The customer or seller has cancelled the order.</li>
							</ul>
						</div>
					</div>
				</div>
@include('eccomerce.user.footer')
@endsection

@section('css')
<style>
	.payment-details p, li{
		font-family: Poppins-Regular;
		color: #000000;
		font-size: 15px;
	}

	.payment-details p{
		margin-top: 15px;
		margin-bottom: 15px;
	}
	.payment-details ul{
		margin-bottom: 20px;
	}
	.payment-details ul li{
		line-height: 30px;
	}

	.payment-details ul li span{
		color: #7971ea;
	}
</style>
@endsection