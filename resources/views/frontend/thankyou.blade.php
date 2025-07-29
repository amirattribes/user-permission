@extends('frontend.layout')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">

                <div class="card shadow-lg border-0 rounded-4 p-4">
                    <div class="card-body">
                        <div class="mb-4">
                            <img src="https://cdn-icons-png.flaticon.com/512/845/845646.png" alt="Success" width="80">
                        </div>

                        <h2 class="text-success mb-3">Thank You for Your Order! 🎉</h2>
                        <p class="fs-5">Your order has been received. We'll contact you shortly for confirmation.</p>

                        <div class="alert alert-secondary mt-4 mb-4">
                            <strong>Order ID:</strong> <span class="text-dark">#{{ $orderId }}</span>
                        </div>

                        <a href="{{ route('home') }}" class="btn btn-primary px-4">
                            🛍️ Continue Shopping
                        </a>
                    </div>
                </div>
                <p class="mt-4">Need help? <a href="{{ route('support') }}">Contact Support</a></p>
            </div>
        </div>
    </div>
@endsection
