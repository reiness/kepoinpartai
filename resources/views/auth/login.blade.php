@extends('layouts.app')

@section('content')
    <style>
        body {
            font-family: poppins, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            width: 100%;
            max-width: 400px; /* Adjust the maximum width as needed */
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Soft shadow */
            border-radius: 8px;
        }

        .card-header, .card-footer {
            background: none; /* Remove background color */
            border: none; /* Remove border */
        }
        
        .card-footer {
            text-align: left; /* Left-align the card footer */
        }

        .logo-container {
            display: flex;
            justify-content: center;
        }

        .logo {
            width: 200px;
            height: 100%;
        }

        .login-button {
            background-color: #5038bc; /* Purple color for the login button */
            color: #fff; /* White text color */
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="logo-container">
                            <img class="logo" src="{{ asset('images/logo1.png') }}" alt="Your Logo" />
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn login-button">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <p style="text-align: left">{{ __("Belum punya akun?") }}</p>
                        <a style="text-align: left" class="btn btn-link" href="{{ route('register') }}">
                            {{ __('Register') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
