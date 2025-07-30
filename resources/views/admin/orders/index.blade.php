@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Orders</h2>
    <table class="table">
        <thead>
            <tr>
                <th>#ID</th>
                <th>User</th>
                <th>Total</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>#{{ $order->id }}</td>
                <td> order->user->name</td>
                <td>Rs {{ number_format($order->total, 2) }}</td>
                <td>{{ ucfirst(str_replace('_', ' ', $order->status)) }}</td>
                <td>{{ $order->created_at->format('d M Y') }}</td>
                <td><a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-primary">View</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $orders->links() }}
</div>
@endsection
