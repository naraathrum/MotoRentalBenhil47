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

        // Calculate penalty if end_date is overdue
        $current_date = Carbon::now(); // Tanggal saat ini
        $penalty_per_day = 50000; // Denda 50.000 per hari
        
        if ($end_date > $current_date) {
            $days_overdue = $end_date->diffInDays($current_date);
            $penalty_amount = $days_overdue * $penalty_per_day;
        } else {
            $penalty_amount = 0;
        }
        
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
            'total_price' => $total_price
            
        ]);

        // Update the status of the item to 0
        // $item->update([
        //     'status' => 0
        // ]);

        return redirect()->route('front.payment', $booking->id);
        // return view('checkout', [
        //     'penaltyAmount' => $penalty_amount]);
    }
    public function returnMotor(Request $request)
{
    $bookings = Booking::where('user_id', Auth::id())->get();

    // Check if the user has previous bookings, then delete them
    if ($bookings->isNotEmpty()) {
        foreach ($bookings as $booking) {
            $booking->delete();
        }
    }

    return redirect()->route('front.index');
}

}
