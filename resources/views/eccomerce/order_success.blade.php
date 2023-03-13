@extends('layouts.eccomerce.app')
@section('title', 'ReaBook - Order Success' )
@section('content')

	<div class="bg0 p-t-80 p-b-85">
		<div class="container">
			{{-- <h2 class="text-center mb-3">Order Success!</h2> --}}
			<div class="row d-flex justify-content-center">
				<div class="col-lg-8 text-center">
                    <img src="{{ asset('eccomerce/images/confirm.png') }}" width="300px" class="mt-4">
                    <div class="order-success-text">
                        <h4 class="mb-3">Thank You For Your Order!</h4>
                        <p>
                            To complete your order, we would like to provide you with the following payment details <a href="{{ route('user.order.show', $order->id) }}">Here!</a>
                        </p>
                    </div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('css')
<style>
	.order-success-text{

    }
</style>
@endsection
