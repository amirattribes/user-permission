@extends('frontend.layout')

@section('content')
<div class="container py-5">
    <h2 class="mb-5 text-center fw-bold">Latest Products</h2>
    <div class="row g-4">
        @forelse($products as $product)
            <div class="col-md-3">
                <div class="card h-100 shadow-sm border-0 rounded-4 product-card">
                    <div class="overflow-hidden rounded-top-4" style="height: 200px;">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top h-100 w-100 object-fit-cover hover-zoom" alt="{{ $product->name }}">
                        @else
                            <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top h-100 w-100 object-fit-cover" alt="No image">
                        @endif
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-center">{{ $product->name }}</h5>
                        <p class="card-text text-center fw-semibold mb-3">PKR {{ number_format($product->price, 2) }}</p>
                        <div class="mt-auto">
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-secondary btn-sm w-100 mb-2">
                                View Details
                            </a>
                            <form method="POST" action="{{ route('cart.add') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-primary btn-sm w-100">Add to Cart</button>
                            </form>
                        </div>
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
