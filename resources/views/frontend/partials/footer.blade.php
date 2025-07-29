<footer class="bg-dark text-light pt-5 pb-4 mt-5">
    <div class="container">
        <div class="row">

            <!-- Company Info -->
            <div class="col-md-4">
                <h5>About Us</h5>
                <p>We offer quality products with fast delivery & easy payments. Your satisfaction is our priority.</p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}" class="text-light">Home</a></li>
                    <li><a href="{{ route('cart.index') }}" class="text-light">Cart</a></li>
                    <li><a href="{{ route('support') }}" class="text-light">Support</a></li>
                    <li><a href="{{ route('login') }}" class="text-light">Login</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-md-4">
                <h5>Contact Us</h5>
                <ul class="list-unstyled text-light">
                    <li>Email: support@example.com</li>
                    <li>Phone: +92 334 3701960</li>
                    <li>Address: Karachi, Pakistan</li>
                </ul>
            </div>
        </div>

        <hr class="bg-light">

        <div class="text-center text-muted">
            &copy; {{ now()->year }} YourStore. All rights reserved.
        </div>
    </div>
</footer>
