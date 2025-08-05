@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Edit User</h2>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary btn-sm">← Back</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-bold">Name</label>
                    <input type="text" name="name" class="form-control"
                        value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Email</label>
                    <input type="email" name="email" class="form-control"
                        value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">New Password</label>
                    <input type="password" name="password" class="form-control"
                        placeholder="Leave blank to keep current password">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Confirm New Password</label>
                    <input type="password" name="password_confirmation" class="form-control"
                        placeholder="Leave blank to keep current password">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Assign Roles</label><br>
                    @foreach($roles as $role)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="roles[]"
                                value="{{ $role->name }}" id="role-{{ $role->id }}"
                                {{ in_array($role->name, old('roles', $user->roles->pluck('name')->toArray())) ? 'checked' : '' }}>
                            <label class="form-check-label" for="role-{{ $role->id }}">
                                {{ ucfirst($role->name) }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-success">Update User</button>
            </form>
        </div>
    </div>
</div>
@endsection
