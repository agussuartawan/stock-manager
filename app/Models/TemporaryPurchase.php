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

    public function getPriceAttribute($value)
    {
        return idr($value);
    }

    protected static function booted()
    {
        static::creating(function ($temporaryPurchase) {
            $temporaryPurchase->user_id = auth()->user()->id;
        });
    }
}
