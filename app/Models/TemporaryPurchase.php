<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryPurchase extends Model
{
    use HasFactory;

    protected $fillable = ['cure_id', 'qty', 'price', 'expired', 'user_id'];

    public function cure()
    {
        return $this->belongsTo(Cure::class);
    }

    protected static function booted()
    {
        static::creating(function ($temporaryPurchase) {
            $temporaryPurchase->user_id = auth()->user()->id;
            $temporaryPurchase->subtotal = (int)$temporaryPurchase->qty * (int)$temporaryPurchase->price;
            // dd();
        });

        static::updating(function ($temporaryPurchase) {
            $temporaryPurchase->user_id = auth()->user()->id;
            $temporaryPurchase->subtotal = (int)$temporaryPurchase->qty * (int)$temporaryPurchase->price;
        });
    }

    public static function getGrandTotal()
    {
        return TemporaryPurchase::where('user_id', auth()->user()->id)->sum('subtotal');
    }
}
