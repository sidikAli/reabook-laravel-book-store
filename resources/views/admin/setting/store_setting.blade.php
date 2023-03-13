@extends('layouts.admin')

@section('title', 'Store Setting')

@section('content')
<!-- Shoping Cart -->
  <div class="bg0 p-t-75 p-b-85">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card p-5">

            @if(session('success'))
						<div class="alert alert-dark alert-dismissible fade show" role="alert">
						  {{  session('success') }}
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						  </button>
						</div>
						@endif

            @if(!$setting)
            {{-- FORM ADD --}}
            <form action="{{ route('store.setting.add') }}" method="POST">
              @csrf
              <h5 class="mb-3 font-weight-bold">Store Bank Info</h5>
              <div class="form-group">
                <label for="bank_name">Bank Name</label>
                <input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="ex: Mandiri">
                <span class="text-danger">@error('bank_name') {{ $message }} @enderror</span>
              </div>
              <div class="form-group">
                <label for="account_name">Account Name</label>
                <input type="text" name="account_name" id="account_name" class="form-control" placeholder="ex: Reabook Indonesia">
                <span class="text-danger">@error('account_name') {{ $message }} @enderror</span>
              </div>
              <div class="form-group">
                <label for="account_number">Account Number</label>
                <input type="text" name="account_number" id="account_number" class="form-control" placeholder="ex: 87113xxx">
                <span class="text-danger">@error('account_number') {{ $message }} @enderror</span>
              </div>

              <h5 class="mb-3 font-weight-bold mt-5">Store Address Info</h5>
              <div class="form-group">
                <label for="province_id">Province</label>
                <select class="form-control" id="province_id" name="province_id" required>
                  <option>Choose Province</option>
                  @foreach($provinces as $province)
                  <option value="{{ $province->id }}">{{ $province->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                  <label for="city">City</label>
                  <select class="form-control" id="city_id" name="city_id" required>
                    <option>Choose City</option>
                  </select>
              </div>
              <div class="form-group">
                  <label for="subdistrict_id">Kecamatan</label>
                  <select class="form-control" id="subdistrict_id" name="subdistrict_id" required>
                    <option>Choose Kecamatan</option>
                  </select>
              </div>
              <div class="form-group">
                <label for="detail">Detail Address</label>
                <textarea name="address_detail" id="detail" rows="4" class="form-control"></textarea>
              </div>
              <div class="text-right">
                <button class="btn btn-dark" type="submit">Save</button>
              </div>
            </form>
            @else
            {{-- FORM UPDATE --}}
            <form action="{{ route('store.setting.update', $setting->id) }}" method="POST">
              @csrf
              @method('PATCH')
              <h5 class="mb-3 font-weight-bold">Store Bank Info</h5>
              <div class="form-group">
                <label for="bank_name">Bank Name</label>
                <input type="text" name="bank_name" id="bank_name" class="form-control" value="{{ $setting->bank_name }}">
                <span class="text-danger">@error('bank_name') {{ $message }} @enderror</span>
              </div>
              <div class="form-group">
                <label for="account_name">Account Name</label>
                <input type="text" name="account_name" id="account_name" class="form-control" value="{{ $setting->bank_account_name }}">
                <span class="text-danger">@error('account_name') {{ $message }} @enderror</span>
              </div>
              <div class="form-group">
                <label for="account_number">Account Number</label>
                <input type="text" name="account_number" id="account_number" class="form-control" value="{{ $setting->bank_account_number }}">
                <span class="text-danger">@error('account_number') {{ $message }} @enderror</span>
              </div>

              <h5 class="mb-3 font-weight-bold mt-5">Store Address Info</h5>
              <div class="form-group">
                <label for="province_id">Province</label>
                <select class="form-control" id="province_id" name="province_id" required>
                  <option>Choose Province</option>
                  @foreach($provinces as $province)
                  <option value="{{ $province->id }}" {{ ($data['province_id'] == $province->id) ? "selected" : ""}}>{{ $province->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                  <label for="city">City</label>
                  <select class="form-control" id="city_id" name="city_id" required>
                    @foreach ($cities as $city)
                      @if($city->id == $data['city_id'])
                      <option id="{{ $city->id }}">{{ $city->name }}</option>
                      @endif
                    @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <label for="subdistrict_id">Kecamatan</label>
                  <select class="form-control" id="subdistrict_id" name="subdistrict_id" required>
                    @foreach ($subdistricts as $subdistrict)
                      @if($subdistrict->id == $setting->subdistricts_id)
                      <option id="{{ $subdistrict->id }}">{{ $subdistrict->name }}</option>
                      @endif
                    @endforeach
                  </select>
              </div>
              <div class="form-group">
                <label for="detail">Detail Address</label>
                <textarea name="address_detail" id="detail" rows="4" class="form-control">{{ $setting->address_detail }}</textarea>
              </div>
              <div class="text-right">
                <button class="btn btn-dark" type="submit">Save</button>
              </div>
            </form>
            @endif

          </div>
        </div>
      </div>
    </div>
  </div>
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
                $('#city_id').append('<option value="">Choose City</option>')
                $('#subdistrict_id').empty()
                $('#subdistrict_id').append('<option value="">Choose Kecamatan</option>')
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
                $('#subdistrict_id').append('<option value="">Choose Kecamatan</option>')
                $.each(html, function(i, data) {
                    $('#subdistrict_id').append('<option value="'+data.id+'">'+data.name+'</option>')
                })
            }
        });
    })
</script>
@endsectio
@endsection