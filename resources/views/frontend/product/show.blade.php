@extends('frontend.layout')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded">
            @else
                <img src="https://via.placeholder.com/500x300?text=No+Image" class="img-fluid rounded">
            @endif
        </div>
        <div class="col-md-6">
            <h2 class="fw-bold">{{ $product->name }}</h2>
            <p class="text-muted">PKR {{ number_format($product->price, 2) }}</p>
            <p>{{ $product->description }}</p>

            <form method="POST" action="{{ route('cart.add') }}">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit" class="btn btn-primary w-100">Add to Cart</button>
            </form>
        </div>
    </div>
</div>

<div class="container mt-5">
    <h4 class="mb-4 text-center">Recommended Products</h4>
    <div class="row g-4">
        @forelse($recommended as $rec)
            <div class="col-md-3">
                <div class="card h-100 shadow-sm">
                    <a href="{{ route('products.show', $rec->id) }}">
                        <img src="{{ asset('storage/' . $rec->image) }}" class="card-img-top" alt="{{ $rec->name }}">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $rec->name }}</h5>
                        <p class="card-text">PKR {{ number_format($rec->price, 2) }}</p>
                        <form method="POST" action="{{ route('cart.add') }}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $rec->id }}">
                            <button type="submit" class="btn btn-outline-primary btn-sm w-100">Add to Cart</button>
                            <a href="{{ route('products.show', $rec->id) }}" class="btn btn-outline-secondary btn-sm w-100 mt-2">View Details</a>

                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted text-center">No recommended products found.</p>
        @endforelse
    </div>
</div>

@endsection
