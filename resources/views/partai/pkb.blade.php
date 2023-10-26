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
        <img src="{{ asset('images/image_1.png') }}" alt="PKB" style="max-width: 50%; max-height: 50%;">
        <h1>pkb</h1>
        <h4>Ketua umum: {{ $profile_pkb -> ketua_umum }}</h4>
        <p>Ideologi: Pancasila, Demokrasi Islam, Liberalisme, Pluralisme</p>
        <br></br>
        <div class="left">
            <h3>Kasus Korupsi</h3>
            <p>Total Kasus: {{ $profile_pkb -> jumlah_kasus_korupsi }}</p>
            <p>Total Kerugian Negara: {{ $profile_pkb -> nominal_kasus_korupsi }} Miliar</p>
        </div>
        
        <div class="right">
            <h3>Suap & Gratifikasi</h3>
            <p>Total Kasus: {{ $profile_pkb -> jumlah_kasus_suap_gratifikasi }}</p>
            <p>Total Nominal: {{ $profile_pkb -> nominal_suap_gratifikasi }} Miliar</p>
            <h3>Fakta menarik:</h3>
            <p>Kontes Miss World 2013 sempat menimbulkan kehebohan di Indonesia, karena beberapa umat Muslim garis keras menganggap acara tersebut tidak menghormati umat Islam. Tapi plottwist: Meskipun Partai Kebangkitan Bangsa (PKB) adalah partai berbasis Islam, mereka mengejutkan semua orang dengan merilis pernyataan dukungan kepada keputusan Indonesia menjadi tuan rumah Miss World 2013 di Bali.</p>
        </div>
    </div>
</body>
</html>
<div class="container d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
    <p class="mt-3">Informasi yang ditampilkan tidak tepat? Yuk kirim feedbackmu!</p>
    <a href="{{ route('feedback') }}" class="btn btn-primary mt-3">Feedback</a>
</div>
@endsection
