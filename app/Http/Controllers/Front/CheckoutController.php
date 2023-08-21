<?php

namespace App\Http\Controllers\Front;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(Request $request, $slug)
    {
        $item = Item::with(['type', 'brand'])->whereSlug($slug)->firstOrFail();

        return view('checkout', [
            'item' => $item
        ]);
    }

    public function store(Request $request, $slug)
    {
        // Validate the request
        $request->validate([
            'name' => 'required',
            'start_date' => 'required|date_format:d m Y',
            'end_date' => 'required|date_format:d m Y',
            'address' => 'required',
            'city' => 'required',
            'zip' => 'required'
        ]);

        // Format start_date and end_date from dd mm yyyy to timestamp
        $start_date = Carbon::createFromFormat('d m Y', $request->start_date);
        $end_date = Carbon::createFromFormat('d m Y', $request->end_date);

        // Count the number of days between start_date and end_date
        $days = $start_date->diffInDays($end_date);
        
        // Get the item
        $item = Item::whereSlug($slug)->firstOrFail();

        // Calculate the total price
        $total_price = $days * $item->price;

        // Add 1% tax
        $total_price = $total_price + ($total_price * 0.01);

        // Create a new booking
        $booking = $item->bookings()->create([
            'name' => $request->name,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'address' => $request->address,
            'city' => $request->city,
            'zip' => $request->zip,
            'user_id' => auth()->user()->id,
            'total_price' => $total_price,
            'status_motor' => 'Dipake', // Set status motor
            
        ]);
         
        return redirect()->route('front.payment', $booking->id);
     
    }
//     
public function returnMotor(Request $request)
{
    $userId = Auth::id();
    $currentDate = now();

    // Mengambil semua booking yang dimiliki oleh user dengan user_id tertentu
    $bookings = Booking::where('user_id', $userId)->get();

    foreach ($bookings as $booking) {
        if ($booking->end_date < $currentDate) {
            // Menghitung selisih hari antara end_date dan tanggal sekarang
            $daysLate = $currentDate->diffInDays($booking->end_date);

            // Menghitung denda (30000 per hari keterlambatan)
            $denda = 30000 * $daysLate;

            // Update kolom 'denda' dalam booking dengan nilai denda yang dihitung
            $booking->update(['denda' => $denda]);
            
            // Update status pembayaran jika belum dibayar (opsional)
            if ($booking->payment_status === 'pending') {
                $booking->update(['payment_status' => 'late']);
            }

            // Update status motor menjadi 'Dikembalikan'
            
        }
        $booking->update(['status_motor' => 'Dikembalikan']);
    }

    return redirect()->route('front.index')->with('success', 'Motor berhasil dikembalikan');
}


    
}
