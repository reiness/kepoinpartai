<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/customize_party.css') }}">
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image">
    <title>kepoin partai | Hanura</title>
</head>
<body>
@extends('layouts.app')

<section>
    <div class="container" style="padding-top: 120px;">
        <img class = "logo-partai"src="{{ asset('images/image_10.png') }}" alt="logo partai" >
        <h1 style="margin-bottom: 20px; color: #5038bc; font-weight: bold">Partai Hati Nurani Rakyat.</h1>

        <div class="card" style=" border-radius: 20px">
        <h3>Ketua umum: {{ $profile_hanura -> ketua_umum }}</h3>
        </div>

        <div class="card" style=" border-radius: 20px">
        <h3 style="color: #5038bc;font-weight: medium">Ideologi</h3>
        <p>Ideologi: Liberalisme, Nasionalisme, Pancasila, Korporatisme Moderat</p>
        </div>

        <div class="card" style=" border-radius: 20px">
            <h3 style="color: #5038bc;font-weight: medium">Kasus Korupsi</h3>
            <p>Total Kasus: {{ $profile_hanura -> jumlah_kasus_korupsi }}</p>
            <p>Total Kerugian Negara: {{ $profile_hanura -> nominal_kasus_korupsi }} Miliar</p>
        </div>
        
        <div class="card" style=" border-radius: 20px">
            <h3 style="color: #5038bc; font-weight: medium">Suap & Gratifikasi</h3>
            <p>Total Kasus: {{ $profile_hanura -> jumlah_kasus_suap_gratifikasi }}</p>
            <p>Total Nominal: {{ $profile_hanura -> nominal_suap_gratifikasi }} Miliar</p>
        </div>

        <div class="card" style=" border-radius: 20px">
        <h3 style="color: #5038bc;font-weight: medium">Fakta Menarik:</h3> 
        <p>Pendiri dan mantan Ketua Partai Hanura, Wiranto, merelakan lebih dari 100 mantan kader Hanura untuk pindah dan bergabung dengan Partai Persatuan Pembangunan (PPP) sebagai kandidat legislatif baru di Pemilu 2024. Wiranto mengaku, dirinya tidak akan memaksa dan memberikan kebebasan pada kadernya untuk memilih rumah perjuangan yang sesuai dengan aspirasi politiknya.</p>
        </div>
    </div>
</section>

<section>
<section>
    <div class="feedback">
        <h1 class="mt-3 text-typing-animation">Informasi yang ditampilkan tidak tepat? Yuk kirim <span style="color: #5038bc; font-weight: medium">feedbackmu!</span></h1>
        <a href="{{ route('feedback') }}" id="feedback-button" class="button-86 mt-3">Feedback</a>
    </div>
</section>


<script>
    // JavaScript for hover effect on the feedback button
    const feedbackButton = document.getElementById('feedback-button');

    feedbackButton.addEventListener('mouseover', function () {
        feedbackButton.style.backgroundColor = '#422c9d'; // Darker purple on hover
    });

    feedbackButton.addEventListener('mouseout', function () {
        feedbackButton.style.backgroundColor = '#5038bc'; // Purple color on mouseout
    });
</script>
</section>
</body>
</html>
