<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Shopping Site')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>

    /* Header */
    header {
      background: #6b21a8;
      color: white;
      padding: 15px 40px;
      text-align: center;
    }

    /* Categories Menu */
    nav {
      background: #f3f4f6;
      padding: 10px 40px;
      display: flex;
      gap: 20px;
      overflow-x: auto;
    }
    nav a {
      text-decoration: none;
      color: #444;
      font-weight: bold;
      padding: 8px 15px;
      border-radius: 20px;
      transition: 0.3s;
      white-space: nowrap;
    }
    nav a:hover,
    nav a.active {
      background: #6b21a8;
      color: white;
    }

    /* Products Section */
    .products {
      max-width: 1200px;
      margin: 30px auto;
      padding: 0 20px;
    }
    .products h2 {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
      color: #111827;
    }

    /* Product Grid */
    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 20px;
    }

    /* Product Card */
    .card {
      background: white;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      transition: 0.3s;
    }
    .card:hover {
      box-shadow: 0 6px 12px rgba(0,0,0,0.15);
    }
    .card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }
    .card-body {
      padding: 15px;
    }
    .card-body h4 {
      font-size: 18px;
      margin: 0 0 8px;
    }
    .card-body p {
      font-size: 14px;
      color: #6b7280;
      margin-bottom: 12px;
      height: 38px;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    .price-btn {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .price {
      color: #6b21a8;
      font-weight: bold;
    }
    .btn {
      background: #6b21a8;
      color: white;
      padding: 6px 14px;
      border-radius: 8px;
      text-decoration: none;
      font-size: 14px;
      transition: 0.3s;
    }
    .btn:hover {
      background: #4c1d95;
    }
  </style>


  

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
<?php 
    use App\Models\Category; 
    $categories = Category::all(); 
?>
    <!-- Categories Menu -->
  <nav>
    <a href="{{ route('home') }}" class="active">All</a>
    @foreach($categories as $cat)
    <a href="{{ route('category.show', $cat->id) }}">{{ $cat->name }}</a>
     @endforeach
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
