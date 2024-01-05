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
<div class="modal fade" id="partaiModal" tabindex="-1" role="dialog" aria-labelledby="partaiModalLabel"aria-hidden="true">
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
                <button id="revoteButton" class="btn btn-primary" style="display:none;">Revote</button>
            </div>
        </div>
    </div>
</div>
<!-- Use the full version of jQuery (3.7.1) -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<!-- Include Bootstrap JavaScript (you already have this) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Your custom script -->
<!-- Add this code in your blade file where JavaScript is defined -->
<script>
    $(document).ready(function () {
        let idPartai = null;
        let hasVoted = false;

        function updateVoteButton() {
            if (hasVoted) {
                $('#voteButton').hide();
                $('#revoteButton').show();
            } else {
                $('#voteButton').show();
                $('#revoteButton').hide();
            }
        }

        // Function to update modal content based on voting status
        function updateModalContent() {
            if (hasVoted) {
                $('#namaPartaiText').text('Are you sure you want to change your vote to this?');
                $('#revoteButton').show();
            } else {
                $('#namaPartaiText').text('Are you sure you want to vote for this?');
                $('#voteButton').show();
            }
        }

        // Check if the user has already voted
        $.ajax({
            type: 'GET',
            url: '{{ route('vote.check') }}',
            success: function (response) {
                hasVoted = response.alreadyVoted;
                updateVoteButton();
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
            }
        });

        // Handle click on image selection
        $('.select-image').click(function () {
            idPartai = $(this).data('id-partai');
            updateModalContent();
        });

        // Function to submit vote (used by both Vote and Revote buttons)
        function submitVote() {
            $.ajax({
                type: 'POST',
                url: '{{ route('vote.vote') }}',
                data: {
                    id_partai: idPartai
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.message === 'Vote updated successfully' || response.message === 'Vote successful') {
                        $('#namaPartaiText').text('Vote successful');
                        hasVoted = true;
                        updateVoteButton();
                    } else {
                        $('#namaPartaiText').text('Failed to vote');
                    }
                    $('#voteButton, #revoteButton').hide();
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        }

        // Handle click on Vote button
        $('#voteButton').click(function () {
            submitVote();
        });

        // Handle click on Revote button
        $('#revoteButton').click(function () {
            // Submit the revote
            $.ajax({
                type: 'POST',
                url: '{{ route('vote.revote') }}',
                data: {
                    id_partai: idPartai
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.message === 'Vote updated successfully') {
                        $('#namaPartaiText').text('Vote updated successfully');
                        updateVoteButton();
                    } else {
                        $('#namaPartaiText').text('Failed to revote');
                    }
                    $('#voteButton, #revoteButton').hide();
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>


@endsection
</body>
</html>