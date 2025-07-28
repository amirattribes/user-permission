@extends('frontend.layout')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">Latest Products</h2>
    <div class="row g-4">
        @forelse($products as $product)
            <div class="col-md-3">
                <div class="card product-card shadow-sm">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    @else
                        <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top" alt="No image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">PKR {{ number_format($product->price, 2) }}</p>
                        <a href="#" class="btn btn-outline-primary btn-sm w-100">View</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">No products found.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
