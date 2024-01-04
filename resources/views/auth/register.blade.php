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

    .card-footer {
        text-align: left; /* Left-align the card footer */
    }

    .btn-primary {
        background-color: #5038bc; /* Purple button color */
        border: none;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: center; background-color: transparent;">
                    <img class="logo" src="{{ asset('images/logo1.png') }}" alt="Your Logo" style="width: 200px; height: 100%;" />
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="username">{{ __('Username') }}</label>
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autofocus>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class "form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                         <!-- Modified dropdown for Province -->
                         <div class="form-group">
                            <label for="province">Province:</label>
                            <select name="province" id="province" class="form-control">
                                @foreach(\App\Models\DimTempat::distinct()->pluck('province') as $province)
                                    <option value="{{ $province }}">{{ $province }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Modified dropdown for City -->
                        <div class="form-group" style="display:none;" id="cityDropdown">
                            <label for="city">City:</label>
                            <select name="city" id="city" class="form-control">
                                <!-- Options will be populated dynamically using JavaScript -->
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </form>
                </div>

                <div class="card-footer" style="background-color: transparent;">
                    <p style="text-align: left">{{ __("Sudah punya akun?") }}</p>
                    <a style="text-align: left" class="btn btn-link" href="{{ route('login') }}">
                        {{ __('Login') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('province').addEventListener('change', function() {
        var province = this.value;
        var cityDropdown = document.getElementById('cityDropdown');
        var citySelect = document.getElementById('city');
        
        // Clear existing options
        citySelect.innerHTML = '';

        // If a province is selected, fetch and populate cities
        if (province !== '') {
            // You may need to adjust the URL and API endpoint based on your backend structure
            fetch('/api/cities/' + province)
                .then(response => response.json())
                .then(data => {
                    data.forEach(city => {
                        var option = document.createElement('option');
                        option.value = city;
                        option.textContent = city;
                        citySelect.appendChild(option);
                    });

                    // Show the City dropdown after populating options
                    cityDropdown.style.display = 'block';
                })
                .catch(error => console.error('Error fetching cities:', error));
        } else {
            // Hide the City dropdown if no province is selected
            cityDropdown.style.display = 'none';
        }
    });
</script>
@endsection