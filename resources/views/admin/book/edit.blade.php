@extends('layouts.admin')

@section('title', 'Edit Book')

@section('content')
<div class="card">
  <div class="card-body">
    <form method="POST" action="{{ route('book.update', $book->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      <div class="form-group row">
        <label for="judul" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
          <input type="text" name="judul" class="form-control" id="judul" value="{{ $book->judul }}">
          @error('judul')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="penulis" class="col-sm-2 col-form-label">Author</label>
        <div class="col-sm-10">
          <input type="text" name="penulis" class="form-control" id="penulis" value="{{ $book->penulis }}">
          @error('penulis')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="penerbit" class="col-sm-2 col-form-label">Publisher</label>
        <div class="col-sm-10">
          <input type="text" name="penerbit" class="form-control" id="penerbit" value="{{ $book->penerbit }}">
          @error('penerbit')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="deskripsi" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
          <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3">{{$book->deskripsi}}</textarea>
          @error('deskripsi')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="jumlah_halaman" class="col-sm-2 col-form-label">Pages</label>
        <div class="col-sm-10">
          <input type="text" name="jumlah_halaman" class="form-control" id="jumlah_halaman" value="{{ $book->jumlah_halaman }}">
          @error('jumlah_halaman')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="harga" class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-10">
          <input type="number" name="harga" class="form-control" id="harga" value="{{ $book->harga }}">
          @error('harga')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="discount" class="col-sm-2 col-form-label">Discount (%)</label>
        <div class="col-sm-10">
          <input type="number" name="discount" class="form-control" id="discount" value="{{ $book->discount }}">
          @error('discount')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>


      <div class="form-group row">
        <label for="berat" class="col-sm-2 col-form-label">Weight (gram)</label>
        <div class="col-sm-10">
          <input type="number" name="berat" class="form-control" id="berat" value="{{ $book->berat }}">
          @error('berat')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="qty" class="col-sm-2 col-form-label">Stock</label>
        <div class="col-sm-10">
          <input type="number" name="qty" class="form-control" id="qty" value="{{ $book->qty }}">
          @error('qty')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="kategori" class="col-sm-2 col-form-label">Category</label>
        <div class="col-sm-10">
          <select name="kategori" id="kategori" class="form-control">
            @foreach($categories as $category)
              <option value="{{ $category->id }}" @if($category->id==$book->category_id) selected @endif>{{ $category->name }}</option>
            @endforeach
          </select>
          @error('kategori')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="gambar" class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-10">
          <input type="file" name="gambar" class="form-control" id="gambar">
          @error('gambar')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>      
      
      <div class="d-flex justify-content-end">
        <a href="{{ route('book.index') }}" class="btn btn-secondary">Back</a>
        <button class="btn btn-primary ml-3" type="submit">Update</button>
      </div>
    </form>
  </div>
</div>
@endsection