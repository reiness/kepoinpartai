<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image">
    <title>Vote</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
<!-- Use the full version of jQuery (3.7.1) -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<!-- Include Bootstrap JavaScript (you already have this) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    jQuery(document).ready(function($) {
        console.log('Document ready!');  // Debug
        var idPartai = null;
        var namaPartai = null;
        var hasVoted = false;

        // Check if the user has already voted
        jQuery.ajax({
            type: 'GET',
            url: '{{ route('vote.check') }}',
            success: function(response) {
                hasVoted = response.alreadyVoted;
                if (hasVoted) {
                    // If the user has already voted, hide the Vote button
                    jQuery('.voteButton').hide();
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText); // Log any error messages
            }
        });

        jQuery('.select-image').click(function() {
            idPartai = jQuery(this).data('id-partai');
            namaPartai = jQuery(this).data('nama-partai');

            // Display the ID Partai and Nama Partai in the modal
            jQuery('#idPartaiText').text('ID Partai: ' + idPartai);
            if (hasVoted) {
                jQuery('#namaPartaiText').text('You have already voted and cannot change your choice.');
                jQuery('#voteButton').hide();
            } else {
                jQuery('#namaPartaiText').text('Apakah anda yakin ingin memilih ' + namaPartai + '?');
                jQuery('#voteButton').show();
            }
        });

        jQuery('#voteButton').click(function() {
            if (hasVoted) {
                return;
            }

            // Make an AJAX request to vote
            jQuery.ajax({
                type: 'POST',
                url: '{{ route('vote.vote') }}',
                data: {
                    id_partai: idPartai
                },
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        // Update the modal content with a success message
                        jQuery('#namaPartaiText').text('Vote successful for ' + namaPartai);
                        jQuery('#voteButton').hide(); // Hide the vote button
                        hasVoted = true;
                    } else {
                        // Update the modal content with a failure message
                        jQuery('#namaPartaiText').text('You have already voted for ' + namaPartai);
                        jQuery('#voteButton').hide(); // Hide the vote button
                        hasVoted = true;
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText); // Log any error messages
                }
            });
        });
    });
</script>

@endsection
</body>
</html>