@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>{{ isset($product) ? 'Edit' : 'Add' }} Product</h2>

    <form method="POST" action="{{ isset($product) ? route('product.update', $product->id) : route('product.store') }}" enctype="multipart/form-data">
        @csrf
        @if(isset($product))
            @method('PUT')
        @endif

        {{-- Name --}}
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name ?? '') }}">
            @error('name')
                <div class="text-danger mt-1 small">{{ $message }}</div>
            @enderror
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ old('description', $product->description ?? '') }}</textarea>
            @error('description')
                <div class="text-danger mt-1 small">{{ $message }}</div>
            @enderror
        </div>

        {{-- Price --}}
        <div class="mb-3">
            <label>Price</label>
            <input type="number" name="price" class="form-control" value="{{ old('price', $product->price ?? '') }}">
            @error('price')
                <div class="text-danger mt-1 small">{{ $message }}</div>
            @enderror
        </div>

        {{-- Image --}}
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            @error('image')
                <div class="text-danger mt-1 small">{{ $message }}</div>
            @enderror
            @if(isset($product) && $product->image)
                <img src="{{ asset('storage/' . $product->image) }}" width="100" class="mt-2">
            @endif
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label>Status</label>
            <select name="is_active" class="form-control">
                <option value="1" {{ old('is_active', $product->is_active ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('is_active', $product->is_active ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('is_active')
                <div class="text-danger mt-1 small">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary">{{ isset($product) ? 'Update' : 'Create' }}</button>
        <a href="{{ route('product.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
