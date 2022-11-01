<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CureSale extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'cure_sale';
    protected $fillable = ['cure_id', 'sale_id', 'qty', 'price', 'subtotal', 'stock_id'];

    public function cure()
    {
        return $this->belongsTo(Cure::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
}