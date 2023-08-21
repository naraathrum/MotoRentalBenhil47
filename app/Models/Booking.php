<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'address',
        'city',
        'zip',
        'status',
        'payment_method',
        'payment_status',
        'payment_url',
        'total_price',
        'item_id',
        'user_id',
        'status_motor',
        'denda',
    ];

    protected $dates = [
        'start_date',
        'end_date',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // public function calculateFine()
    // {
    //     // Ambil tanggal hari ini
    //     $today = now();

    //     // Hanya hitung denda jika status booking belum selesai dan tanggal akhir sudah lewat
    //     if ($this->status !== 'completed' && $this->end_date < $today) {
    //         // Hitung selisih hari dari tanggal akhir
    //         $daysLate = $this->end_date->diffInDays($today);

    //         // Harga denda per hari (misalnya: Rp 10.000 per hari)
    //         $finePerDay = 50000;

    //         // Hitung total denda
    //         $totalFine = $daysLate * $finePerDay;

    //         return $totalFine;
    //     }

    //     return 0; // Tidak ada denda
    // }
}


