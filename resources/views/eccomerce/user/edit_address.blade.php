@extends('layouts.eccomerce.app')
@section('title', 'ReaBook - Edit Address' )
@section('content')

@include('eccomerce.user.header')
				<div class="col-9">
				    <div class="card-header text-white bg-dark text-center">
						Edit Address
				    </div>
					<div class="card p-5">
					  <form action="{{ route('user.address.update', $address_id) }}" method="POST">
					  	@csrf
					  	@method('PATCH')
					  	<div class="form-group">
						    <label for="province_id">Provinsi</label>
						    <select class="form-control" id="province_id" name="province_id" required>
						      <option>Pilih Provinsi</option>
						      @foreach($provinces as $province)
						      <option value="{{ $province->id }}">{{ $province->name }}</option>
						      @endforeach
						    </select>
						</div>

						<div class="form-group">
						    <label for="city">Kota</label>
						    <select class="form-control" id="city_id" name="city_id" required>
						      <option>Pilih Kota</option>
						    </select>
						</div>

						<div class="form-group">
						    <label for="subdistrict_id">Kecamatan</label>
						    <select class="form-control" id="subdistrict_id" name="subdistrict_id" required>
						      <option>Pilih Kecamatan</option>
						    </select>
						</div>

						<div class="form-group">
							<label for="detail">Alamat Lengkap</label>
							<textarea name="detail" id="detail" rows="4" class="form-control"></textarea>
						</div>
						<div class="text-center">
							<button class="btn btn-dark" type="submit">Ubah</button>
						</div>
					  </form>
					</div>
				</div>
@include('eccomerce.user.footer')
@endsection

@section('js')
<script type="text/javascript">
	//setiap ubah provinsi
    $('#province_id').on('change', function() {
    	// ambil data provinsi yang terpilih
        let id = $(this).val()
        $.ajax({
        	// ambil data kota berdasarkan id provinsi
            url: "{{ url('/api/getcity') }}",
            type: "GET",
            data: { province_id: id },
            success: function(html){
            	//hapus seluruh isi kota
                $('#city_id').empty()
                //masukan
                $('#city_id').append('<option value="">Pilih Kota</option>')
                $.each(html, function(i, data) {
                    $('#city_id').append('<option value="'+data.id+'">'+data.name+'</option>')
                })
            }
        });
    })

    //setiap ubah provinsi
    $('#city_id').on('change', function() {
        let id = $(this).val()
        $.ajax({
            url: "{{ url('/api/getsubdistrict') }}",
            type: "GET",
            data: { city_id: id },
            success: function(html){
                $('#subdistrict_id').empty()
                //masukan
                $('#subdistrict_id').append('<option value="">Pilih Kecamatan</option>')
                $.each(html, function(i, data) {
                    $('#subdistrict_id').append('<option value="'+data.id+'">'+data.name+'</option>')
                })
            }
        });
    })
</script>
@endsection