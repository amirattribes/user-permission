<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\NewOrderNotification;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('frontend.checkout', compact('cart'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string',
            'payment_method' => 'required|in:cod,jazzcash,stripe',
        ]);

        // Save order
        $order = \App\Models\Order::create([
            'user_id' => auth()->id(),
            'name' => $validated['name'],
            'address' => $validated['address'],
            'phone' => $validated['phone'],
            'payment_method' => $validated['payment_method'],
            'total' => $this->getCartTotal(),
        ]);

        foreach (session('cart', []) as $productId => $item) {
            $order->items()->create([
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        session()->forget('cart'); // Clear cart
        
        Mail::to('amir.attribes@gmail.com')->send(new NewOrderNotification($order));

        // Redirect to Thank You Page
        return redirect()->route('thankyou')->with('order_id', $order->id);
    }

    private function getCartTotal()
    {
        $cart = session('cart', []);
        return collect($cart)->sum(function($item) {
            return $item['price'] * $item['quantity'];
        });
    }

}
