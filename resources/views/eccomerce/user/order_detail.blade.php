@extends('layouts.eccomerce.app')
@section('title', 'ReaBook - Order Detail' )
@section('content')

@include('eccomerce.user.header')
				<div class="col-md-9">
				    <div class="card-header text-white bg-dark text-center">
				    	Order Detail
				    </div>
					
					<div class="card p-5">
						@if(session('success'))
						<div class="alert alert-primary alert-dismissible fade show mb-5" role="alert" style="color:#000000; font-family: Poppins-Regular">
							Thank you for your payment. Please wait 24 hours for your order status to change.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						</div>
						@endif
						<table class="table">
							<tr>
								<td>Invoice</td>
								<td>{{ $order->invoice }}</td>
							</tr>

							{{-- buku --}}
							@foreach($order->details as $item)
							<?php
								$discount = 0;
								$book_discount = 0;
								$book_price = $item->book->harga;
								if(!empty($item->book->discount)){
									$discount = $book_price * $item->book->discount / 100;
									$book_discount = $book_price - $discount;
								};
							?>
							<tr>
								<th>{{ $item->book->judul }} x{{ $item->qty }}</th>
								<td>@currency((($book_discount) ? $book_discount : $book_price) * $item->qty) @if (!empty($discount)) <span class="text-primary" style="font-size: 12px">({{ $item->book->discount }}% OFF)</span>@endif</td>
							</tr>
							@endforeach

							<tr>
								<td>Subtotal</td>
								<td>@currency($order->subtotal)</td>
							</tr>

							<tr>
								<td>Shipping</td>
								<td>@currency($order->ongkir)</td>
							</tr>

							<tr>
								<td>Total</td>
								<td>@currency($order->total)</td>
							</tr>

							<tr>
								<td>Status</td>
								<td>{{ $order->status }}</td>
							</tr>
						</table>
						@if($order->status == "Waiting For Payment")
						<div class="payment-details">
							<p>Here are the payment details you need to complete your order:</p>
							<ul>
								<li>Bank name: <span>{{ $store_setting->bank_name }}</span></li>
								<li>Account name: <span>{{ $store_setting->bank_account_name }}</span></li>
								<li>Account number: <span>{{ $store_setting->bank_account_number }}</span></li>
								<li>Total:  <span>@currency($order->total)</span> </li>
								<li class="mt-2">*Please include your Invoice in the payment note for a smooth transaction. If you have any questions or concerns, feel free to contact our customer service team.</li>
							</ul>
						</div>
						<div class="payment-button">
							<form action="{{ route('order.payment.confirmation') }}" method="POST">
								@csrf
								<input type="hidden" value="{{ $order->id }}" name="order_id">
								<button class="btn btn-primary w-100">
									Already Pay!
								</button>
							</form>
						</div>
						@else
						<a href="{{ route('user.order') }}" class="btn btn-primary w-100">
							Back
						</a>
						@endif
						
					</div>
				</div>
@include('eccomerce.user.footer')
@endsection

@section('css')
<style>
	.payment-details p, li{
		font-family: Poppins-Regular;
		color: #000000;
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
		color: #007bff;
	}
</style>
@endsection