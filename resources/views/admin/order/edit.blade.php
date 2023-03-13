<div class="form-group">
    <label for="">Invoice</label>
    <input type="text" class="form-control" id="invoice" name="invoice" value="{{ $order->invoice }}" disabled>
</div>
<div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ $order->name }}" disabled>
</div>
<div class="form-group">
    <label for="">Total</label>
    <input type="text" class="form-control" id="total" name="total" value="@currency($order->total)" disabled>
</div>
<div class="form-group">
  <label for="">Status</label>
  <select class="form-control mr-2" name="status">
    <option value="Waiting For Payment" {{ ($order->status == "Waiting For Payment") ? "selected" : "" }}>Waiting For Payment</option>
    <option value="Pending" {{ ($order->status == "Pending") ? "selected" : "" }}>Pending</option>
    <option value="Confirmed" {{ ($order->status == "Confirmed") ? "selected" : "" }}>Confirmed</option>
    <option value="Shipped" {{ ($order->status == "Shipped") ? "selected" : "" }}>Shipped</option>
    <option value="Delivered" {{ ($order->status == "Delivered") ? "selected" : "" }}>Delivered</option>
    <option value="Cancelled" {{ ($order->status == "Cancelled") ? "selected" : "" }}>Cancelled</option>
  </select>
</div>
<input type="hidden" name="id" value="{{ $order->id }}">