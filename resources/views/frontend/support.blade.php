@extends('frontend.layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h2 class="mb-4">Need Help? Contact Support</h2>
            <p class="lead">We're here to assist you. If you have any issues with your order or website, feel free to reach out.</p>

            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Support Options</h5>
                    <ul class="list-unstyled mt-3">
                        <li><strong>Email:</strong> <a href="mailto:support@example.com">amir.attribes@gmail.com</a></li>
                        <li><strong>Phone:</strong> <a href="tel:+923001234567">+92 334 3701960</a></li>
                        <li><strong>Live Chat:</strong> Coming soon!</li>
                    </ul>

                    <hr class="my-4">

                    <p class="text-muted">Our support team is available Monday to Saturday (10am - 6pm).</p>
                    <a href="{{ route('home') }}" class="btn btn-primary mt-3">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
