@extends('layouts.eccomerce.app')
@section('title', 'ReaBook - Profile' )
@section('content')

@include('eccomerce.user.header')
				<div class="col-md-9">
				    <div class="card-header text-white bg-dark text-center">
				      Account Profile
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
					  <form action="{{ route('user.ubah', Auth::user()->id) }}" method="POST">
					  	@csrf
					  	@method('PATCH')
						  <div class="form-group">
							  <label for="detail">Email</label>
							  <input type="text" class="form-control" value="{{ $user->email }}" disabled>
						  </div>
						<div class="form-group">
							<label for="name">Full Name</label>
							<input type="text" class="form-control" name="name" value="{{ $user->name }}">
							@error('name')<span class="text-danger"> {{ $message }} </span>@enderror
						</div>
						<div class="form-group">
							<label for="phone">Phone Number</label>
							<input type="text" class="form-control" name="phone" value="{{ $user->phone }}" placeholder="ex: 087631xxxxx">
							@error('phone')<span class="text-danger"> {{ $message }} </span>@enderror
						</div>
						<div class="text-right">
							<button class="btn btn-dark" type="submit">Ubah</button>
						</div>
					  </form>
					</div>
				</div>
@include('eccomerce.user.footer')
@endsection