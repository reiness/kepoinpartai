@extends('layouts.app')

@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/customize_party.css') }}">
    <title></title>
    <style>
        .container {
            text-align: center;
            margin: auto;
            max-width: 600px;
        }
        .logo {
            max-width: 200px;
            margin-bottom: 20px;
        }
        .left, .right {
            display: inline-block;
            width: 45%;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
        <img src="{{ asset('images/image_6.png') }}" alt="buruh" style="max-width: 50%; max-height: 50%;">
        <h1>buruh</h1>
        <h4>Ketua umum: {{ $profile_buruh -> ketua_umum }}</h4>
        <p>Ideologi: Pancasila, Demokrasi Sosial, Sosialisme</p>
        <br></br>
        <div class="left">
            <h3>Kasus Korupsi</h3>
            <p>Total Kasus: {{ $profile_buruh -> jumlah_kasus_korupsi }}</p>
            <p>Total Kerugian Negara: {{ $profile_buruh -> nominal_kasus_korupsi }} Miliar</p>
        </div>
        
        <div class="right">
            <h3>Suap & Gratifikasi</h3>
            <p>Total Kasus: {{ $profile_buruh -> jumlah_kasus_suap_gratifikasi }}</p>
            <p>Total Nominal: {{ $profile_buruh -> nominal_suap_gratifikasi }} Miliar</p>
            <h3>Fakta menarik:</h3>
            <p>Selasa (5/10/2021) Presiden Partai Buruh Said Iqbal mengatakan, Partai Buruh saat ini sudah didukung oleh 11 gerakan organisasi rakyat. "Organisasi pendiri partai buruh ini adalah 11 gerakan organisasi rakyat, baik yang bergabung gerakan petani, gerakan nelayan, gerakan buruh, gerakan guru, gerakan perempuan Indonesia, dan juga elemen-elemen gerakan sosial lainnya."</p>
        </div>
    </div>
</body>
</html>
<div class="container d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
    <p class="mt-3">Informasi yang ditampilkan tidak tepat? Yuk kirim feedbackmu!</p>
    <a href="{{ route('feedback') }}" class="btn btn-primary mt-3">Feedback</a>
</div>
@endsection
