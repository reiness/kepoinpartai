@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h3>Voting</h3>
    <div class="row">
        @for ($i = 1; $i <= 18; $i++)
            <div class="col-md-2 mb-3">
                <img src="{{ asset('images/image_' . $i . '.png') }}" alt="Image {{ $i }}" class="img-fluid">
            </div>
            @if ($i % 6 == 0)
                </div><div class="row">
            @endif
        @endfor
    </div>
</div>
@endsection
