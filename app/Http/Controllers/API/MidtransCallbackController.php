<?php

namespace App\Http\Controllers\API;

use Midtrans\Config;
use Midtrans\Notification;
use App\Models\Booking;
use App\Http\Controllers\Controller;

class MidtransCallbackController extends Controller
{
    public function callback()
    {
        // Set konfigurasi midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // Buat instance midtrans notification
        $notification = new Notification();

        // Assign ke variable untuk memudahkan coding
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;

        // Cari transaksi berdasarkan ID
        $bookings = Booking::findOrFail($order_id);

        // Handle notification status midtrans

        if ($status == 'capture') {
            if ($fraud == 'challenge') {
                // TODO Set payment status in merchant's database to 'challenge'
                $bookings->payment_status = 'pending';
            } else if ($fraud == 'accept') {
                // TODO Set payment status in merchant's database to 'success'
                $bookings->payment_status = 'success';
            }
        } else if ($status == 'cancel') {
            if ($fraud == 'challenge') {
                // TODO Set payment status in merchant's database to 'failure'
                $bookings->payment_status = 'failed';
            } else if ($status == 'accept') {
                // TODO Set payment status in merchant's database to 'failure'
                $bookings->payment_status = 'failed';
            }
        } else if ($status == 'deny') {
            // TODO Set payment status in merchant's database to 'failure'
            $bookings->payment_status = 'failed';
        } else if ($status == 'settlement') {
            // TODO Set payment status in merchant's database to 'Settlement'
            $bookings->payment_status = 'success';
        } else if ($status == 'pending') {
            // TODO Set payment status in merchant's database to 'Pending'
            $bookings->payment_status = 'pending';
        } else if ($status == 'expire') {
            // TODO Set payment status in merchant's database to 'expire'
            $bookings->payment_status = 'failed';
        }


        // if ($status == 'capture') {
        //     if ($type == 'credit_card') {
        //         if ($fraud == 'challenge') {
        //             $bookings->payment_status = 'pending';
        //         } else {
        //             $bookings->payment_status = 'success';
        //         }
        //     }
        // } else if ($status == 'settlement') {
        //     $bookings->payment_status = 'success';
        // } else if ($status == 'pending') {
        //     $bookings->payment_status = 'success';
        // } else if ($status == 'deny') {
        //     $bookings->payment_status = 'cancelled';
        // } else if ($status == 'expire') {
        //     $bookings->payment_status = 'cancelled';
        // } else if ($status == 'cancel') {
        //     $bookings->payment_status = 'cancelled';
        // }

        // Simpan transaksi
        $bookings->save();

        // Return response
        // return response()->json([
        //     'meta' => [
        //         'code' => 200,
        //         'message' => 'Midtrans Notification Success'
        //     ]
        // ]);
        return redirect()->route('payment.success');
    }

    // Function to generate a unique order ID using the uniqid function
    public function generateOrderId()
    {
        return uniqid();
    }
}