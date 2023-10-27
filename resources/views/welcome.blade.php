<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kepoin Partai</title>
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    @extends('layouts.app');

    <section>
        <div class="welcome">
            <h1> <span class="auto-type"></span></h1>
        </div>

        <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    <script>
        var typerd = new Typed(".auto-type", {
            strings: [
                "Welcome To <span class='special-word'>Kepoin Partai</span>",
                "A Place To Know <span class='special-word'>Partai Politik</span>",
                "A Cool Way To <span class='special-word'>Compare</span>"
            ],
            typeSpeed: 600,
            backSpeed: 600,
            loop: true
        });
    </script>

    <!-- Include Bootstrap JavaScript and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </section>


    <section>
    <div class="countdown">
        <h1>Until <span class="special-word">Pemilu 2024.</span></h1>
    </div>

    <div class="containerC">
        <div class="countdowns">
            <ul>
                <li><span class="days"></span>Days</li>
                <li><span class="hours"></span>Hours</li>
                <li><span class="minutes"></span>Minutes</li>
                <li><span class="seconds"></span>Seconds</li>
            </ul>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</section>

<section>
<div class="container">
    <h1>Get To Know Your <span class="typed-text Special-word"></span><span class="cursor">&nbsp;</span></h1>
  </div>
  
  <script src="{{ asset('js/app2.js') }}"></script>

</section>

<section>
<div class="container">
    <div class="content">
        <h1>Go to <span class="special-word">Visualization</span> Page Now</h1>
    </div>
    <div class="content">
        <button id="voteButton" class="button-86">Visual page</button>
    <script>
    // Add an event listener to the button
    document.getElementById('voteButton').addEventListener('click', function() {
        // Redirect to the desired URL
        window.location.href = "{{ route('kasus_viz') }}";
    });
    </script>
    </div>
</div>
</section>

</body>
</html>
