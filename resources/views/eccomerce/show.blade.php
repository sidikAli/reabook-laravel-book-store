@extends('layouts.eccomerce.app')
@section('title', 'ReaBook - ' . ucwords(strtolower($book->judul)) )
@section('content')
<div class="container">
	<div class="single-product">
		<div class="row">
			<div class="col-md-6">
				<div class="product-image">
					<div class="product-image-main">
						<img src="{{ asset('buku/' . $book->gambar) }}" id="product-main-image">
						@if (!empty($book->discount))
						<span class="discount-label" style="font-size: 15px; top:0px">{{ $book->discount }}% OFF</span>
						@endif
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="breadcrumb">
					<span><a href="{{ route('eccomerce.index') }}">Home</a></span>
					<span><a href="{{ route('eccomerce.product') }}">Books</a></span>
					<span class="active">{{ $book->category->name }}</span>
				</div>

				<div class="product">
					<div class="product-title">
						<h2>{{ $book->judul }}</h2>
					</div>
					{{-- <div class="product-rating">
						<span><i class="bx bxs-star"></i></span>
						<span><i class="bx bxs-star"></i></span>
						<span><i class="bx bxs-star"></i></span>
						<span><i class="bx bxs-star"></i></span>
						<span><i class="bx bxs-star"></i></span>
						<span class="review">(47 Review)</span>
					</div> --}}
					<div class="author-publisher">
						<h5>{{ $book->penulis }} - <span>{{ $book->penerbit }}</span></h5>
					</div>
					<div class="product-price">
						@if(empty($book->discount))
						<span class="offer-price">@currency($book->harga)</span>
						@else
						@php
						$discount = $book->harga * $book->discount / 100
						@endphp
						<span class="offer-price">@currency($book->harga - $discount)</span>
						<span class="sale-price" style="text-decoration-color:#5344db">@currency($book->harga)</span>
						@endif
					</div>

					<div class="product-details">
						<h3>Description</h3>
						<p>{{ \Illuminate\Support\Str::limit($book->deskripsi, 200, $end='...') }}</p>
					</div>
					{{-- <div class="product-size">
						<div class="size-layout">
							<input type="radio" name="size" value="S" id="1" class="size-input">
							<label for="1" class="size">Soft Cover</label>

							<input type="radio" name="size" value="M" id="2" class="size-input">
							<label for="2" class="size">Hard Cover</label>
						</div>
					</div> --}}
					<span class="divider"></span>

					<div class="product-btn-group">
						<form action="{{ route('cart.create') }}" method="POST">
							@csrf
							@if(Route::has('login'))
								@auth
									<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
								@endauth
							@endif
							<div class="flex-w p-b-10">
								<div class="flex-w flex-m respon6-next">
									<div class="wrap-num-product flex-w m-r-20 m-tb-10">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product" type="number" value="1" name="qty">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>
									<input type="hidden" name="book_id" value="{{ $book->id }}">
									<button class="button add-cart"><i class='bx bxs-cart' ></i> Add to Cart</button>
								</div>
							</div>	
						</form>
						{{-- <div class="button buy-now"><i class='bx bxs-zap' ></i> Buy Now</div>
						<div class="button add-cart"><i class='bx bxs-cart' ></i> Add to Cart</div>
						<div class="button heart"><i class='bx bxs-heart' ></i> Add to Wishlist</div> --}}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="bor10 m-t-50 p-t-43 p-b-40">
	<!-- Tab01 -->
	<div class="tab01">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li class="nav-item p-b-10">
				<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Overview</a>
			</li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content p-t-43">
			<!-- - -->
			<div class="tab-pane fade show active" id="description" role="tabpanel">
				<div class="how-pos2 p-lr-15-md">
					<p class="stext-102">
						{{ $book->deskripsi }}
					</p>

					<h3 class="text-center book-detail-title">Book Detail</h3>
					<div class="book-detail d-flex justify-content-center">
						<table>
							<tr>
								<td>Title:</td>
								<td>{{ $book->judul }}</td>
							</tr>
							<tr>
								<td>Author:</td>
								<td>{{ $book->penulis }}</td>
							</tr>
							<tr>
								<td>Publisher:</td>
								<td>{{ $book->penerbit }}</td>
							</tr>
							<tr>
								<td>Weight:</td>
								<td>{{ $book->berat }} Gram</td>
							</tr>
							<tr>
								<td>Page:</td>
								<td>{{ $book->jumlah_halaman }}</td>
							</tr>
							<tr>
								<td>Cetogory:</td>
								<td>{{ $book->category->name }}</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('css')
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
<style>
:root{
	--primary-color: #5344db;
	--accent-color: #5344db;
	--grey:#000000;
	--bg-grey: #efefef;product-title h2
	--shadow: #949494;
}
.product-title h2{
	color: #000000;
}
.product-price .offer-price{
	color: #000000;
}
.product-details h3,p{
	color: #000000;
}
.author-publisher h5{
	font-size: 19px;
	margin-top: 10px;
	color: var(--primary-color)
}
.book-detail-title{
    margin-top: 30px;
    font-size: 15px;
    font-family: Poppins-Regular;
    color: black;
    margin-bottom: 18px;
}

.book-detail td{
	color: #000000;
	line-height: 30px;
	font-family: Poppins-Regular;
}
.book-detail tr td:first-child{
	width: 150px;
}
</style>
@endsection
