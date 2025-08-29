@extends('frontend.layout')

@push('title')
    <title>My Online Store</title>
@endpush

@section('content')
<div class="bg-gray-50 min-h-screen">

    {{-- Navbar with Categories --}}
    <nav class="bg-white shadow sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center h-16">
            {{-- Logo --}}
            <a href="{{ url('/') }}" class="text-xl font-bold text-purple-600">MyStore</a>

            {{-- Categories --}}
            <ul class="hidden md:flex space-x-6 font-medium">
                <li><a href="{{ route('home') }}" class="hover:text-purple-600">All</a></li>
                @foreach($categories as $cat)
                    <li>
                        <a href="{{ route('category.show', $cat->id) }}" 
                           class="hover:text-purple-600 {{ request()->is('category/'.$cat->id) ? 'text-purple-600 font-semibold' : '' }}">
                            {{ $cat->name }}
                        </a>
                    </li>
                @endforeach
            </ul>

            {{-- Mobile Menu Button --}}
            <div class="md:hidden">
                <button id="menu-btn" class="focus:outline-none">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M4 6h16M4 12h16m-7 6h7"/>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobile-menu" class="hidden bg-white border-t p-4 md:hidden">
            <a href="{{ route('home') }}" class="block py-2 hover:text-purple-600">All</a>
            @foreach($categories as $cat)
                <a href="{{ route('category.show', $cat->id) }}" 
                   class="block py-2 hover:text-purple-600 {{ request()->is('category/'.$cat->id) ? 'text-purple-600 font-semibold' : '' }}">
                    {{ $cat->name }}
                </a>
            @endforeach
        </div>
    </nav>

    {{-- Hero Banner --}}
    <div class="relative bg-gradient-to-r from-pink-500 to-purple-600 text-white rounded-b-2xl shadow-lg mb-10">
        <div class="p-12 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Shop the Best Products</h1>
            <p class="text-lg">Perfumes, Makeup, Stationery, Toys, Clothes & more!</p>
            <a href="#products" 
               class="mt-6 inline-block px-6 py-3 bg-white text-purple-600 font-semibold rounded-xl shadow hover:bg-gray-100 transition">
                Start Shopping
            </a>
        </div>
    </div>

    {{-- Products Grid --}}
    <div id="products" class="max-w-7xl mx-auto px-4">
        <h2 class="text-2xl font-bold mb-6">
            {{ isset($selectedCategory) ? $selectedCategory->name : 'All Products' }}
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @forelse($products as $product)
                <div class="bg-white rounded-2xl shadow hover:shadow-lg transition overflow-hidden">
                    <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="h-48 w-full object-cover">
                    <div class="p-4">
                        <h4 class="text-lg font-medium">{{ $product->name }}</h4>
                        <p class="text-gray-500 text-sm truncate">{{ $product->description }}</p>
                        <div class="flex justify-between items-center mt-3">
                            <span class="text-purple-600 font-semibold">Rs. {{ $product->price }}</span>
                            <a href="{{ route('product.show', $product->id) }}" 
                               class="text-sm bg-purple-600 text-white px-3 py-1 rounded-lg hover:bg-purple-700">
                               View
                            </a>
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
