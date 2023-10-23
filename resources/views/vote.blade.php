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
                <form id="voteForm" method="POST" action="{{ route('vote.vote') }}">
                    @csrf <!-- Add this line to include the CSRF token -->
                    <input type="hidden" name="id_partai" id="idPartaiInput">
                    <button id="voteButton" class="btn btn-primary" type="submit">Vote</button>
                </form>
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

        jQuery('.select-image').click(function() {
            idPartai = jQuery(this).data('id-partai');
            var namaPartai = jQuery(this).data('nama-partai');

            // Display the ID Partai and Nama Partai in the modal
            jQuery('#idPartaiText').text('ID Partai: ' + idPartai);
            jQuery('#namaPartaiText').text('Apakah anda yakin ingin memilih ' + namaPartai + '?');
            // Set the hidden input field value with the selected id_partai
            jQuery('#idPartaiInput').val(idPartai);
        });
    });
</script>
@endsection
