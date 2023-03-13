@extends('layouts.admin')

@section('title', 'Edit Category')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <form action="{{ route('category.update', $category->id) }}" method="POST">
          @csrf
          @method('PATCH')
          <div class="form-group">
            <label for="">Category</label>
            <input type="text" class="form-control" name="name" value="{{ $category->name }}">
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="d-flex justify-content-end">
            <a href="{{ route('category.index') }}" class="btn btn-secondary mr-2">Back</a>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection