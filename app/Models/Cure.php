<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cure extends Model
{
    use HasFactory;

    protected $fillable = [
        'cure_unit_id',
        'cure_type_id',
        'rack_id',
        'code',
        'name',
        'minimum_stock',
        'purchase_price',
        'selling_price',
    ];

    public function getPurchasePriceAttribute($value)
    {
        return idr($value);
    }

    public function getSellingPriceAttribute($value)
    {
        return idr($value);
    }

    public function cureType()
    {
        return $this->belongsTo(CureType::class);
    }

    public function cureUnit()
    {
        return $this->belongsTo(CureUnit::class);
    }

    public function rack()
    {
        return $this->belongsTo(Rack::class);
    }
}
