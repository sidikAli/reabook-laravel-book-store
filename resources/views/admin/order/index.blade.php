@extends('layouts.admin')

@section('title', 'List Order - ReaBook')

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
            <form action="{{ route('order.index') }}" method="GET" class="d-flex justify-content-end">
                <select class="form-control mr-2" name="status">
                    <option value="">All Status</option>
                    <option value="Waiting For Payment" {{ (Request::get('status') == "Waiting For Payment") ? "selected" : "" }}>Waiting For Payment</option>
                    <option value="Pending" {{ (Request::get('status') == "Pending") ? "selected" : "" }}>Pending</option>
                    <option value="Confirmed" {{ (Request::get('status') == "Confirmed") ? "selected" : "" }}>Confirmed</option>
                    <option value="Shipped" {{ (Request::get('status') == "Shipped") ? "selected" : "" }}>Shipped</option>
                    <option value="Delivered" {{ (Request::get('status') == "Delivered") ? "selected" : "" }}>Delivered</option>
                    <option value="Cancelled" {{ (Request::get('status') == "Cancelled") ? "selected" : "" }}>Cancelled</option>
                </select>
                <input type="text" name="search" class="form-control mr-2" placeholder="ex: admin" value="{{ Request::get('search')  }}">
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
              <th>Name</th>  
              <th>Invoice</th>  
              <th>Total</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
             @php ($no = 1)
            @foreach($orders as $order)
            <tr>
              <td> {{ $no++ }} </td>
              <td> {{ $order->user->name }} </td>
              <td> {{ $order->invoice }} </td>
              <td> @currency($order->total) </td>
              <td> {{ $order->status }} </td>
              <td>
                <form action="{{ route('order.destroy', $order->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  {{-- <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button> --}}
                  {{-- <a href="{{ route('order.edit', $order->id) }}" class="btn btn-sm btn-primary"></a> --}}
                  <button type="button" class="btn btn-sm btn-primary modal-button" data-toggle="modal" data-target="#statusModal" data-id="{{ $order->id }}">
                    Change Status
                  </button>
                  <a href="{{ route('order.show', $order->id) }}" class="btn btn-sm btn-success">Detail</a>
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
          {{ $orders->links() }}
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
        url: 'order/' + id + '/edit',
        success: function (data) {
            // Populate the modal with the retrieved data
            changeStatusForm.attr('action', "{{ URL::to('admin/order/') }}"+ "/" + id)
            modal.find('.modal-body').html(data);
        },
        error: function (data) {
            console.log(data);
        }
    });
});
</script>
@endsection
