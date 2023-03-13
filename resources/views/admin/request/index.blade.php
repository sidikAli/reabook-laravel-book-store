@extends('layouts.admin')

@section('title', 'List Request - ReaBook')

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
      <div class="card-header row">
        <div class="col-md-6"></div>
        <div class="order-filter col-md-6">
            <form action="{{ route('book-request.index') }}" method="GET" class="d-flex justify-content-end">
                <select class="form-control mr-2" name="status">
                    <option value="">All Status</option>
                    <option value="pending" {{ (Request::get('status') == "pending") ? "selected" : "" }}>Pending</option>
                    <option value="approved" {{ (Request::get('status') == "approved") ? "selected" : "" }}>Approved</option>
                    <option value="declined" {{ (Request::get('status') == "declined") ? "selected" : "" }}>Declined</option>
                </select>
                <input type="text" name="search" class="form-control mr-2" placeholder="ex: admin@gmail.com" value="{{ Request::get('search')  }}">
                <button type="submit" class="btn btn-sm btn-dark">Filter</button>
            </form>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered">
          <thead>                  
            <tr>
              <th>#</th>
              <th>Email</th>  
              <th width="50%">Book Link</th>  
              <th>Note</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
             @php ($no = 1)
            @foreach($requests as $request)
            <tr>
              <td> {{ $no++ }} </td>
              <td> {{ $request->email }} </td>
              <td> <a href="{{ $request->book_link }}">{{ $request->book_link }}</a> </td>
              <td> {{ $request->note }} </td>
              <td> {{ Str::ucfirst($request->status) }} </td>
              <td>
                  <button type="button" class="btn btn-sm btn-primary modal-button" data-toggle="modal" data-target="#statusModal" data-id="{{ $request->id }}">
                    Change Status
                  </button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
          {{ $requests->links() }}
        </ul>
      </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="statusModalLabel">Change Status</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" id="changeStatusForm">
        @csrf
        @method('PATCH')
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('js')
<script>
    $('#statusModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var modal = $(this);
    var changeStatusForm = $('#changeStatusForm');

    // Send an AJAX request to fetch the product data
    $.ajax({
        type: 'GET',
        url: 'book-request/' + id + '/edit',
        success: function (data) {
            // Populate the modal with the retrieved data
            changeStatusForm.attr('action', "{{ URL::to('admin/book-request/') }}"+ "/" + id)
            modal.find('.modal-body').html(data);
        },
        error: function (data) {
            console.log(data);
        }
    });
});
</script>
@endsection
