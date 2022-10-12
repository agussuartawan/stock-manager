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
        'code'
    ];

    function cure()
    {
        return $this->belongsToMany(Cure::class)->withPivot('qty',' price', 'expired');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}
