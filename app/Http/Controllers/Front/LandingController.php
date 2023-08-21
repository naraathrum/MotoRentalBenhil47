<?php

namespace App\Http\Controllers\Front;

use App\Models\Item;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    // public function index()
    // {
    //     $bookings_auth_id = Booking::where('user_id', Auth::id())->exists();
    //     $isbtndisable = !$bookings_auth_id; // Set $isbtndisable to true if no bookings for the logged-in user.

    //     $bookings = Booking::where('payment_status', 'success')->get();
    //     $item_ids = [];
    //     foreach ($bookings as $booking) {
    //         array_push($item_ids, $booking->item_id);
    //     }

    //     $items = Item::whereNotIn('id', $item_ids)
    //         ->with(['type', 'brand'])
    //         ->latest()
    //         ->take(6)
    //         ->get()
    //         ->reverse();

    //     return view('landing', [
    //         'items' => $items,
    //         'isbtndisable' => $isbtndisable,
    //     ]);
    // }
    public function index()
{
    $itemsWithReturnedMotor = Item::whereHas('bookings', function ($query) {
        $query->where('status_motor', 'Dikembalikan');
    })
    ->whereDoesntHave('bookings', function ($query) {
        $query->where('status_motor', 'Dipake');
    })
    ->with(['type', 'brand'])
    ->latest()
    ->take(6)
    ->get()
    ->reverse();

    $bookings_auth_id = Booking::where('user_id', Auth::id())->exists();
        $isbtndisable = !$bookings_auth_id; // Set $isbtndisable to true if no bookings for the logged-in user.
    // $isbtndisable = !$bookings_auth_id;

    return view('landing', [
        'items' => $itemsWithReturnedMotor,
        'isbtndisable' => $isbtndisable,
    ]);
}

}

