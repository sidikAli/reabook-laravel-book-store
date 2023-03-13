<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('eccomerce/') }}/images/book.jpg');">
		<h2 class="ltext-105 txt-center">
			Account Profile
		</h2>
	</section>	

<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="card">
					  <div class="card-header text-white bg-dark ">
					    Setting
					  </div>
					  <ul class="list-group list-group-flush">
					    <li class="list-group-item"><a href="{{ route('user.profil') }}" class="{{ Request::is('user/profile*') ? "text-primary" : "text-dark" }}">Account Profile</a></li>
					    <li class="list-group-item"><a href="{{ route('user.address') }}" class="{{ Request::is('user/address*') ? "text-primary" : "text-dark" }}">Address</a></li>
					    <li class="list-group-item"><a href="{{ route('user.order') }}" class="{{ Request::is('user/order*') ? "text-primary" : "text-dark" }}" >List Order</a></li>
					  </ul>
					</div>
				</div>