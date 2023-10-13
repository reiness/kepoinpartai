@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h3>Feedback Form</h3>
    <form method="post" action="{{ route('store.feedback') }}">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="Anonymous">
        </div>
        <div class="form-group">
            <label for="feedbacks">Feedback</label>
            <textarea name="feedbacks" id="feedbacks" class="form-control" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Feedback</button>
    </form>
</div>

@if(session('success'))
<script>
    // Check if a success message is present
    alert("{{ session('success') }}"); // Display an alert
    document.getElementById('feedback').value = ''; // Clear the feedback text box
</script>
@endif
@endsection
