@extends('layouts.eccomerce.app')
@section('title', 'ReaBook - Online Bookstore' )
@section('content')

<!-- Product -->
	<div class="bg0 m-t-90 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<h4 class="book-list-title">Browse our wide selection today!</h4>
				</div>

				<div class="flex-w flex-c-m m-tb-10">

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10">
					<form action="{{ route('eccomerce.search') }}" method="get">
						<div class="bor8 dis-flex p-l-15">
								
							<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
								<i class="zmdi zmdi-search"></i>
							</button>

							<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search" placeholder="Search">
						</div>	
					</form>
				</div>
			</div>

				@if(Request::is('books/search*'))
				<div class="mb-5 text-center">
					<h3>Search Results : {{ Request::get('search') }}</h3>
				</div>
				@endif

			<div class="row">
				<div class="col-md-2">
					<div class="sidebar2">
						<h2 class="mb-3">Category</h2>
						<ul>

						  <li><a href="{{ route('eccomerce.product') }}" class=" {{ ( request()->is('books') ? "active" : "" ) }}">
								All Books
						  </a></li>

						  @foreach($categories as $category)
						  <li><a href="{{ route('eccomerce.category', $category->slug) }}" class="{{ ( request()->is('category/'.$category->slug) ? "active" : "" ) }}">
							{{ $category->name }}
						  </a></li>
						  @endforeach
						  
						</ul>
					</div>
				</div>
				<div class="col-md-10 book-list">
					<div class="row">
						@foreach($books as $book)
						<div class="col-lg-3 col-6 col-md-4">
							<!-- Block2 -->
							<div class="block2 mb-5">
								<div class="block2-pic hov-img0">
									<img src="{{ asset('buku/'.$book->gambar) }}" alt="IMG-PRODUCT" class="product-image block2-img">
									@if (!empty($book->discount))
									<span class="discount-label" style="font-size:15px">{{ $book->discount }}% OFF</span>
									@endif
									<a href="{{ route('eccomerce.show', $book->slug) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
										Detail
									</a>
								</div>
		
								<div class="block2-txt flex-w flex-t p-t-14">
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

					<!-- Load more -->
					<div class="flex-c-m flex-w w-full p-t-45">
						{{ $books->links() }}
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection