@extends('layouts.eccomerce.app')
@section('title', 'ReaBook - Checkout' )
@section('content')

	<div class="bg0 p-t-80 p-b-85">
		<div class="container">
			<h2 class="text-center mb-3">Checkout</h2>
			<div class="row d-flex justify-content-center">
				<div class="col-lg-8">
					<div class="card p-2">
						<table class="table table-borderless">
							<tr>
								<th>Books</th>
								<th width="20%">Price</th>
							</tr>
							@foreach($carts as $cart)
							<?php
								$discount = 0;
								$book_discount = 0;
								$book_price = $cart->book->harga;
								if(!empty($cart->book->discount)){
									$discount = $book_price * $cart->book->discount / 100;
									$book_discount = $book_price - $discount;
								};
							?>
							<tr>
								<td>{{ $cart->book->judul }} x {{ $cart->qty }}</td>
								<td>@currency( (($book_discount) ? $book_discount : $book_price) * $cart->qty)</td>
							</tr>
							@endforeach
							<tr>
								<td><b>Shipping Cost</b></td>
								<td>@currency($ongkir)</td>
							</tr>
							<tr>
								<td><b>Total</b></td>
								<td>@currency($total_harga)</td>
							</tr>
							<tr>
								<td><b>Payment</b></td>
							</tr>
							<tr>
								<td>Bank (Manual Confirmation)</td>
								<td class="d-flex justify-content-center"><input type="radio" checked></td>
							</tr>
							<tr>
								<td>Digital Payment (not available yet)</td>
								<td class="d-flex justify-content-center"><input type="radio" disabled></td>
							</tr>
							<tr>
								<td colspan="2">
									<b>Destination Address :</b> ({{ Auth::user()->name }}) ({{ Auth::user()->phone }})
									{{ $address->subdistrict->name }},
									{{ $address->subdistrict->city->name }},
									{{ $address->subdistrict->city->province->name }}.
									{{ $address->detail }}
								</td>
							</tr>
						</table>
						<div class="mr-2 ml-2">
							<form action="{{ route('cart.order') }}" method="POST">
								@csrf
								<div class="form-group">
									<label>Note</label>
									<textarea name="catatan" class="form-control" style="resize: none;"></textarea>
									@error('catatan')
									<small class="text-danger">{{ $message }}</small>
									@enderror
								</div>
								<input type="hidden" value="{{ $total_harga }}" name="total_harga">
								<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">Order Now</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('css')
<style>
	input[type="radio"]{
		accent-color: green;
	}
	input[type="radio"][disabled]{
		color: rgb(37, 37, 37);
	}
</style>
@endsection