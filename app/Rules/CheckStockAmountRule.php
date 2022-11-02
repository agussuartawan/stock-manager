<?php

namespace App\Rules;

use App\Models\Cure;
use Illuminate\Contracts\Validation\InvokableRule;

class CheckStockAmountRule implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public $cure;

    public function __construct($cure_id)
    {
        $this->cure = Cure::find($cure_id);
    }

    public function __invoke($attribute, $value, $fail)
    {
        $cure = $this->cure;
        $stockAmount = $cure->stock->amount;
        $stockRemains = $stockAmount - $value;
        $minimumStock = $cure->minimum_stock;

        if ($minimumStock > $stockRemains) {
            $fail('Stok tidak mencukupi');
        }
    }
}
