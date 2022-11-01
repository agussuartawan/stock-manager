<?php

namespace App\Rules;

use App\Models\Cure;
use App\Models\Stock;
use Illuminate\Contracts\Validation\Rule;

class CheckStockAmountRule implements Rule
{
    public $stock;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($cure_id)
    {
        $this->stock = Stock::where('cure_id')
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}