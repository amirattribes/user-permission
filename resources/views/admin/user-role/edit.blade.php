@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Assign Roles to: <span class="text-primary">{{ $user->name }}</span></h2>

    <form method="POST" action="{{ route('admin.user-role.update', $user->id) }}">
        @csrf
        @method('PUT')

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="mb-3">
                    <label for="roles" class="form-label">Select Roles:</label>
                    <div class="row">
                        @foreach($roles as $role)
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->name }}"
                                        {{ $user->roles->contains('name', $role->name) ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ $role->name }}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @error('roles')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Save Roles</button>
                <a href="{{ route('admin.user-role.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </form>
</div>
@endsection
