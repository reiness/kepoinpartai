<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partai </title>
    <!-- Link to your external CSS file -->
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image">
    <link rel="stylesheet" href="{{ asset('css/partai.css') }}">
    <!-- Add a style for top padding -->
    <style>
        .top-padding {
            padding-top: 120px; /* Adjust this value as needed */
        }
    </style>
</head>
<body>
@extends('layouts.app')

@section('content')
    <!-- Your HTML content here -->
    <div class="container top-padding">
    <div class="row">
        @php
        // Sample data for the cards
        $partaiItems = [
            [
                'name' => 'Partai 1',
                'image' => 'images/image_1.png',
                'description' => 'Description for Partai 1',
            ],
            [
                'name' => 'Partai 2',
                'image' => 'images/image_2.png',
                'description' => 'Description for Partai 2',
            ],
            [
                'name' => 'Partai 3',
                'image' => 'images/image_3.png',
                'description' => 'Description for Partai 3',
            ],
            [
                'name' => 'Partai 4',
                'image' => 'images/image_4.png',
                'description' => 'Description for Partai 4',
            ],
            [
                'name' => 'Partai 5',
                'image' => 'images/image_5.png',
                'description' => 'Description for Partai 5',
            ],
            [
                'name' => 'Partai 6',
                'image' => 'images/image_6.png',
                'description' => 'Description for Partai 6',
            ],
            [
                'name' => 'Partai 7',
                'image' => 'images/image_7.png',
                'description' => 'Description for Partai 7',
            ],
            [
                'name' => 'Partai 8',
                'image' => 'images/image_8.png',
                'description' => 'Description for Partai 8',
            ],
            [
                'name' => 'Partai 9',
                'image' => 'images/image_9.png',
                'description' => 'Description for Partai 9',
            ],
            [
                'name' => 'Partai 10',
                'image' => 'images/image_10.png',
                'description' => 'Description for Partai 10',
            ],
            [
                'name' => 'Partai 11',
                'image' => 'images/image_11.png',
                'description' => 'Description for Partai 11',
            ],
            [
                'name' => 'Partai 12',
                'image' => 'images/image_12.png',
                'description' => 'Description for Partai 12',
            ],
            [
                'name' => 'Partai 13',
                'image' => 'images/image_13.png',
                'description' => 'Description for Partai 13',
            ],
            
            [
                'name' => 'Partai 14',
                'image' => 'images/image_14.png',
                'description' => 'Description for Partai 14',
            ],
            [
                'name' => 'Partai 15',
                'image' => 'images/image_15.png',
                'description' => 'Description for Partai 15',
            ],
            [
                'name' => 'Partai 16',
                'image' => 'images/image_16.png',
                'description' => 'Description for Partai 16',
            ],
            [
                'name' => 'Partai 17',
                'image' => 'images/image_17.png',
                'description' => 'Description for Partai 17',
            ],
            [
                'name' => 'Partai 18',
                'image' => 'images/image_18.png',
                'description' => 'Description for Partai 18',
            ],
        ];
        @endphp
        @foreach($partaiItems as $partai)
            <div class="col-md-3 mb-4"> <!-- Changed to col-md-3 to have four cards in each row -->
                <div class="custom-card">
                    <div class="custom-card-img-container">
                        <img src="{{ asset($partai['image']) }}" alt="{{ $partai['name'] }}" class="card-img-top custom-card-img custom-card-img-rounded"> <!-- Apply rounded class -->
                    </div>
                    <div class="card-body custom-card-content">
                        <h5 class="card-title">{{ $partai['name'] }}</h5>
                        <p class="card-text">{{ $partai['description'] }}</p>
                        <a class="button-86" href="{{ route('partai.pdip') }}">Lihat Profil</a> <!-- Apply custom button class -->
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


    <!-- Include Bootstrap JavaScript and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>


