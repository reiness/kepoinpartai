@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="partai-item">
                <img src="{{ asset('images/image_1.png') }}" alt="Partai 1" style="max-width: 100%; height: auto;">
                <button class="btn btn-primary mt-3">Lihat Profil</button>
            </div>
        </div>
        <div class="col-md-3">
            <div class="partai-item">
                <img src="{{ asset('images/image_2.png') }}" alt="Partai 2" style="max-width: 100%; height: auto;">
                <button class="btn btn-primary mt-3">Lihat Profil</button>
            </div>
        </div>
        <div class="col-md-3">
            <div class="partai-item">
                <div class="image-container">
                    <img src="{{ asset('images/image_3.png') }}" alt="Partai 3" class="img-fluid">
                </div>
                <a href="{{ route('partai.pdip') }}" class="btn btn-primary mt-3">Lihat Profil</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="partai-item">
                <img src="{{ asset('images/image_4.png') }}" alt="Partai 4" style="max-width: 100%; height: auto;">
                <button class="btn btn-primary mt-3">Lihat Profil</button>
            </div>
        </div>
        
        
    </div>
</div>
@endsection
