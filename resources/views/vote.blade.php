@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h3>Voting</h3>
    <div class="row">
        @foreach ($partaiData as $partai)
            <div class="col-md-2 mb-3">
                <a href="#" class="select-image" data-id-partai="{{ $partai->id_partai }}" data-nama-partai="{{ $partai->nama_partai }}" data-toggle="modal" data-target="#partaiModal">
                    <img src="{{ asset('images/image_' . $partai->id_partai . '.png') }}" alt="Image {{ $partai->id_partai }}" class="img-fluid">
                </a>
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
