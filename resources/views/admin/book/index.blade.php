@extends('layouts.admin')

@section('title', 'List Book')

@section('content')
@if(session('success'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  {{  session('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
    <div class="card">
      <div class="card-header">
        <a href="{{ route('book.create') }}" class="btn btn-primary">Add Book</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered">
          <thead>                  
            <tr>
              <th>#</th>
              <th>Title</th>  
              <th>Category</th>  
              <th>Stock</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @php ($no = 1)
            @foreach($books as $book)
            <tr>
              <td> {{ $no++ }} </td>
              <td> {{ $book->judul }} </td>
              <td> {{ $book->category->name }} </td>
              <td> {{ $book->qty }} </td>
              <td> Rp. {{ $book->harga }} </td>
              <td>
                <form action="{{ route('book.destroy', $book->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Delete</button>
                  <a href="{{ route('book.edit', $book->id) }}" class="btn btn-sm btn-primary">Edit</a>
                  <a href="{{ route('book.show', $book->id) }}" class="btn btn-sm btn-warning">Detail</a>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
          {{ $books->links() }}
        </ul>
      </div>
    </div>
@endsection