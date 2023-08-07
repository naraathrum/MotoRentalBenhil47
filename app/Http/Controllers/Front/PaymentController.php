<?php

namespace App\Http\Controllers\Front;

use App\Models\booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function index(Request $request, $id)
    {
        $bookings = booking::with(['item.brand','item.type'])->findOrFail($id);

        return view('payment', [
            'bookings' => $bookings
        ]);
    }

    public function update(Request $request, $id)
    {
        $bookings = booking::findOrFail($id);
        $bookings->payment_method = $request->payment_method;
        
        // $this->getSnapRedirect($request,$bookings);
        // return redirect()->route('front.payment.success');

        if ($request->payment_method == 'midtrans') {
            // Call Midtrans API
            \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
            \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
            \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
            \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');

           // Get USD to IDR rate using guzzle
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', 'https://api.exchangerate-api.com/v4/latest/USD');
            $body = $response->getBody();
            $rate = json_decode($body)->rates->IDR;

            // Total price in Rupiah
            $totalPrice = $bookings->total_price; // Tidak melakukan konversi

            // ...

            // Create array for send to API
            $midtransParams = [
                'transaction_details' => [
                    'order_id' => $bookings->id . '-' . Str::random(5),
                    'gross_amount' => (int) $totalPrice,
                ],
                'customer_details' => [
                    'first_name' => $bookings->name,
                    'email' => $bookings->user->email,
                ],
                'enabled_payments' => ['shopeepay','qris', 'bank_transfer','credit_card','indomaret'],
                'vtweb' => []
            ];

            // Get Snap Payment Page URL
            $paymentUrl = \Midtrans\Snap::createTransaction($midtransParams)->redirect_url;

            // Save payment URL to bookings
            $bookings->payment_url = $paymentUrl;
            $bookings->save();

            // Redirect to Snap Payment Page
            return redirect($paymentUrl);
            // return redirect()->route('front.payment.success');
            
        }
    }

    public function getSnapRedirect(Request $request, Booking $bookings)
    {
        if ($request->payment_method == 'midtrans') {
            // Call Midtrans API
            \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
            \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
            \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
            \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');

           // Get USD to IDR rate using guzzle
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', 'https://api.exchangerate-api.com/v4/latest/USD');
            $body = $response->getBody();
            $rate = json_decode($body)->rates->IDR;

            // Total price in Rupiah
            $totalPrice = $bookings->total_price; // Tidak melakukan konversi

            // ...

            // Create array for send to API
            $midtransParams = [
                'transaction_details' => [
                    'order_id' => $bookings->id . '-' . Str::random(5),
                    'gross_amount' => (int) $totalPrice,
                ],
                'customer_details' => [
                    'first_name' => $bookings->name,
                    'email' => $bookings->user->email,
                ],
                'enabled_payments' => ['shopeepay','qris', 'bank_transfer','credit_card','indomaret'],
                'vtweb' => []
            ];

            // Get Snap Payment Page URL
            $paymentUrl = \Midtrans\Snap::createTransaction($midtransParams)->redirect_url;

            // Save payment URL to bookings
            $bookings->payment_url = $paymentUrl;
            $bookings->save();

            // Redirect to Snap Payment Page
            return redirect($paymentUrl);
        }
    }

    public function success(Request $request)
    {
        // $serverKey = config('midtrans.server_key');
        // $hashed = hash()
        return view('success');
    }
}