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
        
     p {
      text-align: center;
    }

    .button-86{
    text-decoration: none; /* Remove underline */
    color: #ffffff; /* Inherit the color from the parent */
    }
                      
    .button-86:hover {
    text-decoration: none; /* Remove underline on hover */
    color: #ffffff; /* Inherit the color from the parent */
    }

    .top-padding {
            padding-top: 120px;
         } /* Adjust this value as needed */
        </style>
    </head>
    <body>
    @extends('layouts.app')

    @section('content')
    <!-- Your HTML content here -->
    
    <div class="container top-padding">
        <div class="row">

            <div class="col-md-3 mb-4">
                <div class="custom-card">
                    <div class="custom-card-img-container">
                        <img src="{{ asset('images/image_1.png') }}" alt="Partai 1" class="card-img-top custom-card-img custom-card-img-rounded">
                    </div>
                    <div class="card-body custom-card-content">
                        {{-- <h5 class="card-title">Partai Kebangkitan Bangsa</h5> --}}
                        <p class="card-text">Partai Kebangkitan Bangsa</p>
                        <a class="button-86" href="{{ route('partai.pkb') }}">Lihat Profil</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="custom-card">
                    <div class="custom-card-img-container">
                        <img src="{{ asset('images/image_2.png') }}" alt="Partai 2" class="card-img-top custom-card-img custom-card-img-rounded">
                    </div>
                    <div class="card-body custom-card-content">
                        {{-- <h5 class="card-title">GERINDRA</h5> --}}
                        <p class="card-text">Partai Gerakan Indonesia Raya</p>
                        <a class="button-86" href="{{ route('partai.gerindra') }}">Lihat Profil</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="custom-card">
                    <div class="custom-card-img-container">
                        <img src="{{ asset('images/image_3.png') }}" alt="Partai 2" class="card-img-top custom-card-img custom-card-img-rounded">
                    </div>
                    <div class="card-body custom-card-content">
                        {{-- <h5 class="card-title">Partai 3</h5> --}}
                        <p class="card-text">Partai Demokrasi Indonesia Perjuangan</p>
                        <a class="button-86" href="{{ route('partai.pdip') }}">Lihat Profil</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="custom-card">
                    <div class="custom-card-img-container">
                        <img src="{{ asset('images/image_4.png') }}" alt="Partai 2" class="card-img-top custom-card-img custom-card-img-rounded">
                    </div>
                    <div class="card-body custom-card-content">
                        {{-- <h5 class="card-title">Partai 4</h5> --}}
                        <p class="card-text">Partai Golongan Karya</p>
                        <a class="button-86" href="{{ route('partai.golkar') }}">Lihat Profil</a>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="custom-card">
                    <div class="custom-card-img-container">
                        <img src="{{ asset('images/image_5.png') }}" alt="Partai 5" class="card-img-top custom-card-img custom-card-img-rounded">
                    </div>
                    <div class="card-body custom-card-content">
                        {{-- <h5 class="card-title">Partai 5</h5> --}}
                        <p class="card-text">Partai Nasional Demokrat</p>
                        <a class="button-86" href="{{ route('partai.NasDem') }}">Lihat Profil</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="custom-card">
                    <div class="custom-card-img-container">
                        <img src="{{ asset('images/image_6.png') }}" alt="Partai 2" class="card-img-top custom-card-img custom-card-img-rounded">
                    </div>
                    <div class="card-body custom-card-content">
                        {{-- <h5 class="card-title">Partai 2</h5> --}}
                        <p class="card-text">Partai Buruh</p>
                        <a class="button-86" href="{{ route('partai.buruh') }}">Lihat Profil</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="custom-card">
                    <div class="custom-card-img-container">
                        <img src="{{ asset('images/image_7.png') }}" alt="Partai 2" class="card-img-top custom-card-img custom-card-img-rounded">
                    </div>
                    <div class="card-body custom-card-content">
                        {{-- <h5 class="card-title">Partai 3</h5> --}}
                        <p class="card-text">Partai Gelora Indonesia</p>
                        <a class="button-86" href="{{ route('partai.gelora') }}">Lihat Profil</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="custom-card">
                    <div class="custom-card-img-container">
                        <img src="{{ asset('images/image_8.png') }}" alt="Partai 2" class="card-img-top custom-card-img custom-card-img-rounded">
                    </div>
                    <div class="card-body custom-card-content">
                        {{-- <h5 class="card-title">Partai 4</h5> --}}
                        <p class="card-text">Partai Keadilan Sejahtera</p>
                        <a class="button-86" href="{{ route('partai.pks') }}">Lihat Profil</a>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="custom-card">
                    <div class="custom-card-img-container">
                        <img src="{{ asset('images/image_9.png') }}" alt="Partai 1" class="card-img-top custom-card-img custom-card-img-rounded">
                    </div>
                    <div class="card-body custom-card-content">
                        {{-- <h5 class="card-title">Partai 1</h5> --}}
                        <p class="card-text">Partai Kebangkitan Nusantara</p>
                        <a class="button-86" href="{{ route('partai.pkn') }}">Lihat Profil</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="custom-card">
                    <div class="custom-card-img-container">
                        <img src="{{ asset('images/image_10.png') }}" alt="Partai 2" class="card-img-top custom-card-img custom-card-img-rounded">
                    </div>
                    <div class="card-body custom-card-content">
                        {{-- <h5 class="card-title">Partai 2</h5> --}}
                        <p class="card-text">Partai Hati Nurani Rakyat</p>
                        <a class="button-86" href="{{ route('partai.hanura') }}">Lihat Profil</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="custom-card">
                    <div class="custom-card-img-container">
                        <img src="{{ asset('images/image_11.png') }}" alt="Partai 2" class="card-img-top custom-card-img custom-card-img-rounded">
                    </div>
                    <div class="card-body custom-card-content">
                        {{-- <h5 class="card-title">Partai 3</h5> --}}
                        <p class="card-text">Partai Garuda</p>
                        <a class="button-86" href="{{ route('partai.garuda') }}">Lihat Profil</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="custom-card">
                    <div class="custom-card-img-container">
                        <img src="{{ asset('images/image_12.png') }}" alt="Partai 12" class="card-img-top custom-card-img custom-card-img-rounded">
                    </div>
                    <div class="card-body custom-card-content">
                        {{-- <h5 class="card-title">Partai 12</h5> --}}
                        <p class="card-text">Partai Amanat Nasional</p>
                        <a class="button-86" href="{{ route('partai.PAN') }}">Lihat Profil</a>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="custom-card">
                    <div class="custom-card-img-container">
                        <img src="{{ asset('images/image_13.png') }}" alt="Partai 1" class="card-img-top custom-card-img custom-card-img-rounded">
                    </div>
                    <div class="card-body custom-card-content">
                        {{-- <h5 class="card-title">Partai 1</h5> --}}
                        <p class="card-text">Partai Bulan Bintang</p>
                        <a class="button-86" href="{{ route('partai.pbb') }}">Lihat Profil</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="custom-card">
                    <div class="custom-card-img-container">
                        <img src="{{ asset('images/image_14.png') }}" alt="Partai 2" class="card-img-top custom-card-img custom-card-img-rounded">
                    </div>
                    <div class="card-body custom-card-content">
                        {{-- <h5 class="card-title">Partai 2</h5> --}}
                        <p class="card-text">Partai Demokrat</p>
                        <a class="button-86" href="{{ route('partai.demokrat') }}">Lihat Profil</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="custom-card">
                    <div class="custom-card-img-container">
                        <img src="{{ asset('images/image_15.png') }}" alt="Partai 2" class="card-img-top custom-card-img custom-card-img-rounded">
                    </div>
                    <div class="card-body custom-card-content">
                        {{-- <h5 class="card-title">Partai 3</h5> --}}
                        <p class="card-text">Partai Solidaritas Indonesia</p>
                        <a class="button-86" href="{{ route('partai.PSI') }}">Lihat Profil</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="custom-card">
                    <div class="custom-card-img-container">
                        <img src="{{ asset('images/image_16.png') }}" alt="Partai 2" class="card-img-top custom-card-img custom-card-img-rounded">
                    </div>
                    <div class="card-body custom-card-content">
                        {{-- <h5 class="card-title">Partai 4</h5> --}}
                        <p class="card-text">Partai Persatuan Indonesia</p>
                        <a class="button-86" href="{{ route('partai.perindo') }}">Lihat Profil</a>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="custom-card">
                    <div class="custom-card-img-container">
                        <img src="{{ asset('images/image_17.png') }}" alt="Partai 1" class="card-img-top custom-card-img custom-card-img-rounded">
                    </div>
                    <div class="card-body custom-card-content">
                        {{-- <h5 class="card-title">Partai 1</h5> --}}
                        <p class="card-text">Partai Persatuan Pembangunan</p>
                        <a class="button-86" href="{{ route('partai.ppp') }}">Lihat Profil</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="custom-card">   
                    <div class="custom-card-img-container">
                        <img src="{{ asset('images/image_18.png') }}" alt="Partai 2" class="card-img-top custom-card-img custom-card-img-rounded">
                    </div>
                    <div class="card-body custom-card-content">
                        {{-- <h5 class="card-title">Partai 2</h5> --}}
                        <p class="card-text">Partai Ummat</p>
                        <a class="button-86" href="{{ route('partai.pu') }}">Lihat Profil</a>
                    </div>
                </div>
            </div>

            
            
        </div>
    </div>

    

    <!-- Include Bootstrap JavaScript and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>