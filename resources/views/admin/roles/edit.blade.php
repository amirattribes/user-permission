@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Role</h2>

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Role Name --}}
        <div class="mb-3">
            <label for="name" class="form-label">Role Name</label>
            <input type="text" name="name" id="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $role->name) }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Permissions --}}
        <div class="mb-3">
            <label class="form-label">Assign Permissions</label>
            <div class="row">
                @foreach ($permissions as $permission)
                    <div class="col-md-3">
                        <div class="form-check">
                            <input
                                type="checkbox"
                                name="permissions[]"
                                value="{{ $permission->id }}"
                                class="form-check-input"
                                id="perm_{{ $permission->id }}"
                                {{ in_array($permission->id, old('permissions', $rolePermissions)) ? 'checked' : '' }}
                            >
                            <label class="form-check-label" for="perm_{{ $permission->id }}">
                                {{ $permission->name }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
            @error('permissions')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- Buttons --}}
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update Role</button>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
