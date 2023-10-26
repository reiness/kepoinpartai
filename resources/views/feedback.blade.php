<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image">
    <link rel="stylesheet" href="{{ URL::asset('css/customize_party.css') }}">
    <title>Feedback</title>
    <style>
        /* Add custom CSS styles here */
        .custom-card {
            background: #fff;
            padding: 40px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin: 20% auto 0; /* Center the custom-card with top padding */
        }

        section {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
@extends('layouts.app')

@section('content')
<section>
    <div class="custom-card text-center">
        <h1 style="font-family: 'Poppins', sans-serif; font-size: 50px; font-weight: bold;">Feedback</h1>
        <form method="post" action="{{ route('store.feedback') }}">
            @csrf
            <div class="form-group">
                <label for "nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control nama-input" value="Anonymous">
            </div>
            <div class="form-group">
                <label for="feedbacks">Feedback</label>
                <textarea name="feedbacks" id="feedbacks" class="form-control" rows="5" style="border-radius: 10px;"></textarea>
            </div>
            <button type="submit" class="button-86 mt-3" style="font-size: 20px">Submit Feedback</button>
        </form>
    </div>
</section>

@if(session('success'))
<script>
    // Check if a success message is present
    alert("{{ session('success') }}"); // Display an alert
    document.getElementById('feedbacks').value = ''; // Clear the feedback text box
</script>
@endif

<style>
    /* Add custom CSS styles here */
    .nama-input {
        color: rgba(128, 128, 128, 0.8); /* Transparent gray-like color */
    }
</style>
@endsection
</body>
</html>
