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
        return $this->belongsToMany(Cure::class)->withPivot('qty', 'price');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}
