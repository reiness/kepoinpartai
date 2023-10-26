
 <!-- Include Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>
    .navbar-nav .nav-item a.nav-link:hover {
        color: #fff;
    }

/* Add rounded border to the Register button with increased specificity */
.navbar-nav .nav-item a.nav-link:nth-child(3) {
    border: 1px solid #5038bc !important;
    border-radius: 20px;
    padding: 8px 20px;
}

</style>

<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #fff; box-shadow: 0px 0px 10px 0px #5038bc;">
    <a class="navbar-brand" href="#">
        <img src="{{ asset('images/logo1.png') }}" alt="Your Logo Alt Text" style="width: auto; height: 60px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="/" style="font-size: 18px; color: #5038bc;">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('partai_all') }}" style="font-size: 18px; color: #5038bc;">Partai</a>
            </li>
            @if(auth()->user() && auth()->user()->is_admin)
            <li class="nav-item">
                <a class="nav-link" href="/admin/dashboard" style="font-size: 18px; color: #5038bc;">Admin</a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="/login" style="font-size: 18px; color: #5038bc; margin-left: 20px;">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/register" style="font-size: 18px; color: #5038bc;">Register</a>
            </li>
        </ul>
    </div>
</nav>

    
<div class="container mt-4">
        @yield('content')
    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
