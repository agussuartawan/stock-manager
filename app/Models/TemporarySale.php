<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporarySale extends Model
{
    use HasFactory;

    protected $fillable = ['cure_id', 'qty', 'price', 'user_id'];

    public function cure()
    {
        return $this->belongsTo(Cure::class);
    }

    protected static function booted()
    {
        static::creating(function ($temporarySale) {
            $temporarySale->user_id = auth()->user()->id;
            $temporarySale->subtotal = (int)$temporarySale->qty * (int)$temporarySale->price;
        });

        static::updating(function ($temporarySale) {
            $temporarySale->user_id = auth()->user()->id;
            $temporarySale->subtotal = (int)$temporarySale->qty * (int)$temporarySale->price;
        });
    }

    public static function getGrandTotal()
    {
        return TemporarySale::where('user_id', auth()->user()->id)->sum('subtotal');
    }
}