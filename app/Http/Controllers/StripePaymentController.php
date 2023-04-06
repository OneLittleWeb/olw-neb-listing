<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Stripe\Stripe;

class StripePaymentController extends Controller
{
    public function index()
    {
        $cities = City::all();
        $city = null;
        return view('checkout', compact('cities', 'city'));
    }

    public function checkout()
    {
        Stripe::setApiKey(config('services.stripe.secret_key'));
        $session = \Stripe\Checkout\Session::create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'unit_amount' => 2000,
                    'product_data' => [
                        'name' => 'T-shirt',
                        'description' => 'Comfortable cotton t-shirt',
                        'images' => ['https://example.com/t-shirt.png'],
                    ],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('stripe.success'),
            'cancel_url' => route('home'),
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        return view('stripe.success');
    }
}
