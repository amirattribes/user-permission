@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Create Permission</h2>

    <form action="{{ route('admin.permissions.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Permission Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button class="btn btn-success">Create</button>
        <a href="{{ route('admin.permissions.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
