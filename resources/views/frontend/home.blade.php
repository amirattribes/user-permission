@extends('frontend.layout')

@push('title')
    <title>My Online Store</title>
@endpush

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Products Section -->

    <div id="products" class="products">
        <h2>
            {{ isset($selectedCategory) ? $selectedCategory->name : 'All Products' }}
        </h2>
        <div class="grid">
            @forelse($products as $product)
                <div class="card">
                    <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="h-48 w-full object-cover">
                    <div class="card-body">
                        <h4 class="">{{ $product->name }}</h4>
                        <p>{{ $product->description }}</p>
                        <div class="price-btn">
                            <span class="price">Rs. {{ $product->price }}</span>
                            <a href="{{ route('product.show', $product->id) }}" 
                               class="text-sm bg-purple-600 text-white px-3 py-1 rounded-lg hover:bg-purple-700">
                               View
                            </a>
                        </div>
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
            @empty
                <p class="text-gray-500">No products found.</p>
            @endforelse
        </div>
    </div>
</div>

{{-- Mobile menu toggle script --}}
<script>
    const btn = document.getElementById("menu-btn");
    const menu = document.getElementById("mobile-menu");
    btn.addEventListener("click", () => {
        menu.classList.toggle("hidden");
    });
</script>
@endsection
