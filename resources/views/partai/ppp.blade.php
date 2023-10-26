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
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
        <img src="{{ asset('images/image_17.png') }}" alt="PPP" style="max-width: 50%; max-height: 50%;">
        <h1>ppp</h1>
        <h4>Ketua umum: {{ $profile_ppp -> ketua_umum }}</h4>
        <p>Ideologi: Pan-Islamisme, Konservatisme</p>
        <br></br>
        <div class="left">
            <h3>Kasus Korupsi</h3>
            <p>Total Kasus: {{ $profile_ppp -> jumlah_kasus_korupsi }}</p>
            <p>Total Kerugian Negara: {{ $profile_ppp -> nominal_kasus_korupsi }} Miliar</p>
        </div>
        
        <div class="right">
            <h3>Suap & Gratifikasi</h3>
            <p>Total Kasus: {{ $profile_ppp -> jumlah_kasus_suap_gratifikasi }}</p>
            <p>Total Nominal: {{ $profile_ppp -> nominal_suap_gratifikasi }} Miliar</p>
            <h3>Fakta menarik:</h3>
            <p>PPP memulai perjalanan mereka dengan bangga menampilkan simbol Ka'bah - situs suci penting dalam agama Islam - sebagai logo mereka. Namun, kemudian memutuskan untuk mengubah logo mereka menjadi bintang lima berwarna kuning emas. Namun sekarang PPP kembali memutuskan untuk mengembalikan simbol ikonik Ka'bah, sesuai dengan ideologi mereka.</p>
        </div>
    </div>
</body>
</html>
<div class="container d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
    <p class="mt-3">Informasi yang ditampilkan tidak tepat? Yuk kirim feedbackmu!</p>
    <a href="{{ route('feedback') }}" class="btn btn-primary mt-3">Feedback</a>
</div>
@endsection
