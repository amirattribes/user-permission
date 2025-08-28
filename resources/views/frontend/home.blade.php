@extends('frontend.layout')

@push('title')
    <title>My Online Store</title>
@endpush

@section('content')
<div class="bg-gray-50">

    {{-- Hero Banner --}}
    <div class="relative bg-gradient-to-r from-pink-500 to-purple-600 text-white rounded-2xl shadow-lg mb-10">
        <div class="p-12 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Welcome to My Online Store</h1>
            <p class="text-lg">Perfumes, Makeup, Stationery, Toys, Clothes & much more!</p>
            <a href="#categories" class="mt-6 inline-block px-6 py-3 bg-white text-purple-600 font-semibold rounded-xl shadow hover:bg-gray-100 transition">Shop Now</a>
        </div>
    </div>

    {{-- Categories Section --}}
    <div id="categories" class="max-w-7xl mx-auto px-4">
        <h2 class="text-2xl font-bold mb-6">Shop by Category</h2>

        @foreach($categories as $category)
            <div class="mb-12">
                {{-- Category Title --}}
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold">{{ $category->name }}</h3>
                    <a href="" class="text-purple-600 hover:underline">View All</a>
                </div>

                {{-- Product Grid --}}
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    @forelse($category->products->take(4) as $product)
                        <div class="bg-white rounded-2xl shadow hover:shadow-lg transition overflow-hidden">
                            <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="h-48 w-full object-cover">
                            <div class="p-4">
                                <h4 class="text-lg font-medium">{{ $product->name }}</h4>
                                <p class="text-gray-500 text-sm truncate">{{ $product->description }}</p>
                                <div class="flex justify-between items-center mt-3">
                                    <span class="text-purple-600 font-semibold">Rs. {{ $product->price }}</span>
                                    <a href="{{ route('product.show', $product->id) }}" class="text-sm bg-purple-600 text-white px-3 py-1 rounded-lg hover:bg-purple-700">View</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500">No products available.</p>
                    @endforelse
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection
