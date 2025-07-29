<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmed</title>
</head>
<body>
    <h2>Order Received</h2>
    <p>Thank you for your order. We’ll process it soon.</p>

    {{-- You can show order info here --}}
    @isset($order)
        <p><strong>Order ID:</strong> {{ $order->id }}</p>
        <p><strong>Total:</strong> {{ $order->total }}</p>
    @endisset
</body>
</html>
