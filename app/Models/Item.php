<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'type_id',
        'brand_id',
        'photos',
        'features',
        'price',
        'star',
        'review',
        'status'
    ];

    protected $casts = [
        'photos' => 'array',
    ];

    // Get first photo from photos
    public function getThumbnailAttribute()
    {
        // If photos exist
        if ($this->photos) {
            return Storage::url(json_decode($this->photos)[0]);
        }

        return asset('images/default.png');
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function getPriceInIdrAttribute()
{
    // // Konversi harga dari USD ke IDR
    // $usdToIdrRate = 14000; // Misalnya, asumsikan 1 USD = 14,000 IDR
    // $priceInIdr = $this->price * $usdToIdrRate;

    // // Format harga dalam IDR
    // return number_format($priceInIdr / 1000, 0, ',', '.');
}
}
