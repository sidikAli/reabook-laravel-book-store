@extends('layouts.admin')

@section('title', 'Detail Order - ReaBook')

@section('content')
    <div class="card col-md-6">
        <div class="d-flex order-detail justify-content-between mt-3 pr-3 pl-3">
            <span class="font-weight-bold">No. Invoice</span>
            <span>{{ $order->invoice }}</span>
        </div>
        <div class="d-flex order-detail justify-content-between mt-3 pr-3 pl-3">
            <span class="font-weight-bold">Customer Name</span>
            <span>{{ $order->user->name }}</span>
        </div>
        <div class="d-flex order-detail justify-content-between mt-3 pr-3 pl-3">
            <span class="font-weight-bold">Book List</span>
        </div>
        @foreach($order->details as $item)
        <div class="d-flex order-detail justify-content-between mt-3 pr-3 pl-3">
            <span>{{ $item->book->judul }} x{{ $item->qty }}</span>
            <span>@currency($item->book->harga * $item->qty)</span>
        </div>
		@endforeach
        <div class="d-flex order-detail justify-content-between mt-3 pr-3 pl-3">
            <span class="font-weight-bold">Subtotal</span>
            <span>@currency($order->subtotal)</span>
        </div>
        <div class="d-flex order-detail justify-content-between mt-3 pr-3 pl-3">
            <span class="font-weight-bold">Shipment</span>
            <span>@currency($order->ongkir)</span>
        </div>
        <div class="d-flex order-detail justify-content-between mt-3 pr-3 pl-3">
            <span class="font-weight-bold">Total</span>
            <span>@currency($order->total)</span>
        </div>
        <div class="card-footer clearfix">
            <a href="{{ route('order.index') }}" class="btn btn-primary btn-sm w-100">Back</a>
        </div>
    </div>
@endsection

@section('css')
<style>
    .order-detail{

    }
</style>
@endsection
