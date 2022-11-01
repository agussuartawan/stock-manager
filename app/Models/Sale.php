<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'date', 'customer_id', 'grand_total'];

    public function cure()
    {
        return $this->belongsToMany(Cure::class)->withPivot('id', 'qty', 'price', 'subtotal', 'stock_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public static function getNextCode()
    {
        $sale_count = Sale::count();
        if ($sale_count == 0) {
            $number = 10001;
            $fullnumber = 'PNJ' . $number;
        } else {
            $number = Sale::all()->last();
            $number_plus = (int)substr($number->code, -5) + 1;
            $fullnumber = 'PNJ' . $number_plus;
        }

        return $fullnumber;
    }
}