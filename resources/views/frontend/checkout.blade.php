@extends('frontend.layout')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">🛒 Checkout</h2>

    <form method="POST" action="{{ route('checkout.store') }}" class="row g-3 shadow-lg p-4 rounded bg-white">
        @csrf

        <div class="col-md-6">
            <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
            <input name="name" id="name" class="form-control" placeholder="e.g. Ali Khan" required>
        </div>

        <div class="col-md-6">
            <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
            <input name="phone" id="phone" class="form-control" placeholder="e.g. 03XXXXXXXXX" required>
        </div>

        <div class="col-12">
            <label for="address" class="form-label">Shipping Address <span class="text-danger">*</span></label>
            <textarea name="address" id="address" class="form-control" rows="3" placeholder="Complete address..." required></textarea>
        </div>

        <div class="col-md-6">
            <label for="payment_method" class="form-label">Payment Method <span class="text-danger">*</span></label>
            <select name="payment_method" id="payment_method" class="form-select" required>
                <option disabled selected>Select a method</option>
                <option value="cod">Cash on Delivery</option>
                <option value="jazzcash">JazzCash</option>
                <option value="stripe">Stripe</option>
            </select>
        </div>

        <div class="col-12 text-end">
            <button type="submit" class="btn btn-success px-4">🧾 Confirm Order</button>
        </div>
    </form>
</div>
@endsection

