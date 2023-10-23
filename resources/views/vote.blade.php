@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h3>Voting</h3>
    <div class="row">
        @for ($i = 1; $i <= 18; $i++)
            <div class="col-md-2 mb-3">
                <a href="#" class="select-image" data-id-partai="{{ $i }}" data-toggle="modal" data-target="#partaiModal">
                    <img src="{{ asset('images/image_' . $i . '.png') }}" alt="Image {{ $i }}" class="img-fluid">
                </a>
            </div>
        @endfor
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="partaiModal" tabindex="-1" role="dialog" aria-labelledby="partaiModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="partaiModalLabel">ID Partai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="idPartaiText"></p>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select-image').click(function() {
            var idPartai = $(this).data('id-partai');

            // Display the ID Partai in the modal
            $('#idPartaiText').text('ID Partai: ' + idPartai);
        });
    });
</script>
@endsection
