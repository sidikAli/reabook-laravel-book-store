@extends('layouts.eccomerce.app')
@section('title', 'ReaBook - Online Bookstore')
@section('content')
<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1" style="background-image: url({{ asset('eccomerce') }}/images/banner01.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Online Bookstore
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									ReaBook 
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="{{ route('eccomerce.product') }}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url({{ asset('eccomerce') }}/images/banner02.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									Local & Imported Books
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
								<a href="{{ route('eccomerce.product') }}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Discover Here
								</a>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- Product -->
	<section class="bg0 p-t-50 p-b-140">
		<div class="container">
			<div class="p-b-10 d-flex justify-content-between">
				<h3 class="new-books-title mb-4">
					Our Newest Books
				</h3>
				<a class="see-more-title mb-4" href="{{ route('eccomerce.product') }}">
					See More >>
				</a>
			</div>

			{{-- NEWEST BOOKS --}}
			<div class="row">
				@foreach($books as $book)
				<div class="col-lg-2 col-6 col-md-4">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="{{ asset('buku/' . $book->gambar) }}" alt="IMG-PRODUCT">
							@if (!empty($book->discount))
							<span class="discount-label">{{ $book->discount }}% OFF</span>
							@endif
							<a href="{{ route('eccomerce.show', $book->slug) }}" class="block2-btn flex-c-m stext-103 cl2 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Detail
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14 ml-2 p-b-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="{{ route('eccomerce.show', $book->slug) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 book-title">
									{{ \Illuminate\Support\Str::limit($book->judul, 22, $end='...') }}
								</a>

								@if(empty($book->discount))
								<span class="stext-105 cl3">
									{{-- function format rupiah in appserviceprovider --}}
									@currency($book->harga)
								</span>
								@else
								@php
								$discount = $book->harga * $book->discount / 100
								@endphp
								<div class="d-flex">
									<span style="color: #007bff;">
										@currency($book->harga - $discount)
									</span>
									<span class="ml-1" style="text-decoration: line-through; font-size:12px">
										@currency($book->harga)
									</span>
								</div>
								@endif
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>

			<div class="banner mt-5 mb-5">
				<a href="{{ route('eccomerce.product') }}">
					<img src="{{ asset('eccomerce/images/0_1_1200x350.jpeg') }}" width="100%">
				</a>
			</div>

			{{-- ALL BOOKS --}}
			<div class="p-b-10 d-flex justify-content-between">
				<h3 class="new-books-title mb-4">
					All Of Our Collection
				</h3>
				<a class="see-more-title mb-4" href="{{ route('eccomerce.product') }}">
					See More >>
				</a>
			</div>
			<div class="row">
				@foreach($books2 as $book2)
				<div class="col-lg-2 col-6 col-md-4">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="{{ asset('buku/' . $book2->gambar) }}" alt="IMG-PRODUCT">
							@if (!empty($book2->discount))
							<span class="discount-label">{{ $book2->discount }}% OFF</span>
							@endif
							<a href="{{ route('eccomerce.show', $book2->slug) }}" class="block2-btn flex-c-m stext-103 cl2 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Detail
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14 ml-2 p-b-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="{{ route('eccomerce.show', $book2->slug) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 book-title">
									{{ \Illuminate\Support\Str::limit($book2->judul, 22, $end='...') }}
								</a>

								@if(empty($book2->discount))
								<span class="stext-105 cl3">
									{{-- function format rupiah in appserviceprovider --}}
									@currency($book2->harga)
								</span>
								@else
								@php
								$discount = $book2->harga * $book2->discount / 100
								@endphp
								<div class="d-flex">
									<span style="color: #007bff;">
										@currency($book2->harga - $discount)
									</span>
									<span class="ml-1" style="text-decoration: line-through; font-size:12px">
										@currency($book2->harga)
									</span>
								</div>
								@endif
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>

		</div>
	</section>
@endsection