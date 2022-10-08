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

    public function setPurchasePriceAttribute($value)
    {
        $this->attributes['purchase_price'] = str_replace(".", "", $value);
    }

    public function setSellingPriceAttribute($value)
    {
        $this->attributes['selling_price'] = str_replace(".", "", $value);
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

    public static function getNextCode()
    {
        $cure_count = Cure::count();
        if ($cure_count == 0) {
            $number = 10001;
            $fullnumber = 'OBT' . $number;
        } else {
            $number = Cure::all()->last();
            $number_plus = (int)substr($number->code, -5) + 1;
            $fullnumber = 'OBT' . $number_plus;
        }

        return $fullnumber;
    }
}