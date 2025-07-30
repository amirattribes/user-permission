@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Order #{{ $order->id }}</h2>

    <p><strong>Customer:</strong> order->user->name</p>
    <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>

    <form method="POST" action="{{ route('orders.updateStatus', $order->id) }}">
        @csrf @method('PUT')
        <label>Change Status:</label>
        <select name="status" class="form-select mb-2" required>
            @foreach(['pending','in_progress','completed','cancelled'] as $status)
                <option value="{{ $status }}" {{ $order->status === $status ? 'selected' : '' }}>
                    {{ ucfirst(str_replace('_', ' ', $status)) }}
                </option>
            @endforeach
        </select>
        <button class="btn btn-sm btn-success">Update Status</button>
    </form>

    <h4 class="mt-4">Items</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
        @foreach($order->items as $item)
            <tr>
                <td>{{ $item->product->name ?? 'Product Deleted' }}</td>
                <td>{{ $item->quantity }}</td>
                <td>Rs {{ $item->price }}</td>
                <td>Rs {{ $item->price * $item->quantity }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
