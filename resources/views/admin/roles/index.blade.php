@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Roles</h2>
        <a href="{{ route('admin.roles.create') }}" class="btn btn-primary btn-sm">+ Add Role</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 20%;">Name</th>
                        <th>Permissions</th>
                        <th class="text-end" style="width: 20%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($roles as $role)
                        <tr>
                            <td class="fw-bold text-capitalize">{{ $role->name }}</td>
                            <td>
                                @foreach($role->permissions as $permission)
                                    <span class="badge bg-secondary me-1 mb-1">{{ $permission->name }}</span>
                                @endforeach
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>

                                <form method="POST" action="{{ route('admin.roles.destroy', $role->id) }}" class="d-inline-block" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted py-3">No roles found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
