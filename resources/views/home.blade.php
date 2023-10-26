<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image">
    <title>Home</title>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0; /* Add a background color */
        }

        .card {
            width: 100%;
            max-width: 400px; /* Adjust the maximum width as needed */
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Soft shadow */
            border-radius: 8px;
        }

        .card-body {
            text-align: center; /* Center align the content */

            font-size: 20px; /* Make the font bigger */
        }

        .btn {
            top-padding: 10px;
            padding: 10px 20px; /* Make the buttons bigger */
            background-color: purple; /* Set the button color to purple */
            color: white; /* Set text color to white */
        }

        /* Center the buttons */
        .button-86 {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        a.logout-link {
            color: red;
        }
    </style>
</head>
<body>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <br>

                    <style>
                        .logout-link {
                          text-decoration: none; /* Remove underline */
                          color: inherit; /* Inherit the color from the parent */
                        }
                      
                        .logout-link:hover {
                          text-decoration: none; /* Remove underline on hover */
                          color: inherit; /* Inherit the color from the parent */
                        }
                      </style>

                    <a class="logout-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Log out?') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    <style>
                        .button-86 a {
                          text-decoration: none; /* Remove underline */
                          color: inherit; /* Inherit the color from the parent */
                        }
                      
                        .button-86 a:hover {
                          text-decoration: none; /* Remove underline on hover */
                          color: inherit; /* Inherit the color from the parent */
                        }
                      </style>

                    <div class="button-86">
                        <a href="{{ route('kasus_viz') }}">Kasus visualisasi</a>
                    </div>
                    <div class="button-86">
                        <a href="{{ route('vote') }}">Vote suara anda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

</body>
</html>
