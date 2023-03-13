@extends('layouts.eccomerce.app')
@section('title', 'ReaBook - Book Request' )
@section('content')

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('eccomerce/images/book.jpg') }}');">
		<h2 class="ltext-105 txt-center">
			Request Imported Books
		</h2>
	</section>	

	<!-- Content page -->
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			<div class="row p-b-148">
				<div class="col">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                        @if(session('success'))
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        {{  session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="mtext-111 cl2 p-b-16">
                                    Request a Book
                                </h3>
                                <form action="{{ route('eccomerce.request.create') }}" method="Post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email address*</label>
                                        <input type="email" class="form-control" id="email" placeholder="ex: name@gmail.com" name="email" required> 
                                    </div>
                                    <div class="form-group">
                                        <label for="link">Book Link*</label>
                                        <input type="text" class="form-control" id="link" placeholder="ex: https://www.barnesandnoble.com/" name="book_link" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="note">Note</label>
                                        <textarea class="form-control" id="note" name="note" rows="3" placeholder="ex: I want the hardcover version"></textarea>
                                    </div>
                                    <button class="btn btn-primary btn sm w-100 mb-5">Make a Request</button>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <h3 class="mtext-111 cl2 p-b-16">
                                    How its Work?
                                </h3>
                                <ul>
                                    <li>1. Find the book you want on Amazon, Barnes and Noble, Waterstone, or another online bookstore.</li>
                                    <li>2. Copy the link for the book you want to request.</li>
                                    <li>3. Paste the link into the form.</li>
                                    <li>4. Optionally, add any notes you'd like to include.</li>
                                    <li>5. Enter your email address.</li>
                                    <li>6. Click the "Request a Book" button.</li>
                                    <li>7. Done. Once we've found the book, we'll send you an email with the details and pricing, which includes tax and fee</li>
                                    <li>8. If you're happy with the details, you can make the payment.</li>
                                </ul>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	
		

@endsection

@section('css')
<style>
    ul li{
        font-size: 16px;
        line-height: 33px;
    }
</style>
@endsection