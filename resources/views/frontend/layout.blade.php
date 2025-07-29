<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Shopping Site')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Dawat-e-Islami</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.index') }}">
                        Cart 
                        @if($cartCount > 0)
                            <span class="badge bg-light text-dark">{{ $cartCount }}</span>
                        @endif
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@if(session('success'))
    <div style="position: fixed; top: 80px; right: 20px; z-index: 1055; min-width: 280px;">
        <div class="dismis-after-show alert alert-success shadow-lg rounded-3 px-4 py-3 d-flex justify-content-between align-items-center fade show" role="alert" style="font-size: 0.95rem;">
            <span class="me-3">{{ session('success') }}</span>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close" style="font-size: 0.8rem;"></button>
        </div>
    </div>
@endif

<div class="container">
    @yield('content')
</div>

@include('frontend.partials.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    setTimeout(() => {
        let alertBox = document.querySelector('.dismis-after-show');
        if (alertBox) {
            alertBox.classList.remove('show');
            alertBox.classList.add('fade');
        }
    }, 3000);
</script>

</body>
</html>
