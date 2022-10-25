<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'date',
        'code',
        'grand_total'
    ];

    public static function getNextCode()
    {
        $purchase_count = Purchase::count();
        if ($purchase_count == 0) {
            $number = 10001;
            $fullnumber = 'PMB' . $number;
        } else {
            $number = Purchase::all()->last();
            $number_plus = (int)substr($number->code, -5) + 1;
            $fullnumber = 'PMB' . $number_plus;
        }

        return $fullnumber;
    }

    function cure()
    {
        return $this->belongsToMany(Cure::class)->withPivot('id', 'qty', 'price', 'expired', 'subtotal');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function getDateAttribute($value)
    {
        return dateFormat($value);
    }
}
