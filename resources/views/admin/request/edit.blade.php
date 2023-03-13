<div class="form-group">
    <label for="">Email</label>
    <input type="text" class="form-control" id="email"  value="{{ $book_request->email }}" disabled>
</div>
<div class="form-group">
    <label for="">Book Link</label>
    <input type="text" class="form-control" id="book_link" value="{{ $book_request->book_link }}" disabled>
</div>
<div class="form-group">
    <label for="">Note</label>
    <textarea type="text" class="form-control" id="note"  rows="3" disabled>{{ $book_request->note }}</textarea>
</div>
<div class="form-group">
    <label for="">Status</label>
    <select class="form-control mr-2" name="status">
        <option value="pending" {{ ($book_request->status == "pending") ? "selected" : "" }}>Pending</option>
        <option value="approved" {{ ($book_request->status == "approved") ? "selected" : "" }}>Approved</option>
        <option value="declined" {{ ($book_request->status == "declined") ? "selected" : "" }}>Declined</option>
    </select>
</div>
<input type="hidden" name="id" value="{{ $book_request->id }}">