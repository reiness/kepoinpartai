<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image">
    <title>Vote</title>
</head>
<body>
    

@extends('layouts.app')

@section('content')
<div class="container text-center" style="padding-top: 150px; ">

<section>
<h1 style="margin-bottom: 30px;font-weight: bold">Vote Your <span class="typed-text Special-word" style="color:#5038bc;"></span><span class="cursor">&nbsp;</span></h1>

 <script src="{{ asset('js/app3.js') }}"></script>
 </section>
    <div class="row">
        @foreach ($partaiData as $partai)
            <div class="col-md-3 mb-3">
                <div class="card" style="width: 250px; min-height: 400px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border-radius: 5px; padding: 10px;">
                    <a href="#" class="select-image" data-id-partai="{{ $partai->id_partai }}" data-nama-partai="{{ $partai->nama_partai }}" data-toggle="modal" data-target="#partaiModal">
                        <img src="{{ asset('images/image_' . $partai->id_partai . '.png') }}" alt="Image {{ $partai->id_partai }}" class="card-img-top" style="max-width: 200px; height: auto;">
                        <div class="card-body">
                            <h5 class="card-title" style="color: black; font-family: 'Poppins', sans-serif;">{{ $partai->nama_partai }}</h5>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="partaiModal" tabindex="-1" role="dialog" aria-labelledby="partaiModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="partaiModalLabel">Partai Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="idPartaiText"></p>
                <p id="namaPartaiText"></p>
                <button id="voteButton" class="btn btn-primary">Vote</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>