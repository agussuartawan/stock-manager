<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurePurchase extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'cure_purchase';
    protected $fillable = ['cure_id', 'purchase_id', 'qty', 'price', 'subtotal'];

    public function cure()
    {
        return $this->belongsTo(Cure::class);
    }
}
