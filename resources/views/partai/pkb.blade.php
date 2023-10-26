<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/customize_party.css') }}">
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image">
    <title>kepoin partai | PKB</title>
</head>
<body>
@extends('layouts.app')

<section>
    <div class="container" style="padding-top: 120px;">
        <img class = "logo-partai"src="{{ asset('images/image_1.png') }}" alt="logo partai" >
        <h1 style="margin-bottom: 20px; color: #5038bc; font-weight: bold">Partai Kebangkitan Bangsa.</h1>

        <div class="card" style=" border-radius: 20px">
        <h3>Ketua umum: {{ $profile_pkb -> ketua_umum }}</h3>
        </div>

        <div class="card" style=" border-radius: 20px">
        <h3 style="color: #5038bc;font-weight: medium">Ideologi</h3>
        <p>Ideologi: Pancasila, Demokrasi Islam, Liberalisme, Pluralisme</p>
        </div>

        <div class="card" style=" border-radius: 20px">
            <h3 style="color: #5038bc;font-weight: medium">Kasus Korupsi</h3>
            <p>Total Kasus: {{ $profile_pkb -> jumlah_kasus_korupsi }}</p>
            <p>Total Kerugian Negara: {{ $profile_pkb -> nominal_kasus_korupsi }} Miliar</p>
        </div>
        
        <div class="card" style=" border-radius: 20px">
            <h3 style="color: #5038bc; font-weight: medium">Suap & Gratifikasi</h3>
            <p>Total Kasus: {{ $profile_pkb -> jumlah_kasus_suap_gratifikasi }}</p>
            <p>Total Nominal: {{ $profile_pkb -> nominal_suap_gratifikasi }} Miliar</p>
        </div>

        <div class="card" style=" border-radius: 20px">
        <h3 style="color: #5038bc;font-weight: medium">Fakta Menarik:</h3> 
        <p>Kontes Miss World 2013 sempat menimbulkan kehebohan di Indonesia, karena beberapa umat Muslim garis keras menganggap acara tersebut tidak menghormati umat Islam. Tapi plottwist: Meskipun Partai Kebangkitan Bangsa (PKB) adalah partai berbasis Islam, mereka mengejutkan semua orang dengan merilis pernyataan dukungan kepada keputusan Indonesia menjadi tuan rumah Miss World 2013 di Bali.</p>
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
