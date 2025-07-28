@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Permissions</h2>
        <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-sm">+ Add Permission</a>
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
                        <th style="width: 70%;">Name</th>
                        <th class="text-end" style="width: 30%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($permissions as $permission)
                        <tr>
                            <td class="fw-bold text-capitalize">{{ $permission->name }}</td>
                            <td class="text-end">
                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>

                                <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this permission?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center text-muted py-3">No permissions found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
