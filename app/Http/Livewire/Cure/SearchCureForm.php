<?php

namespace App\Http\Livewire\Cure;

use Livewire\Component;

class SearchCureForm extends Component
{
    public $cure_code;
    public $cure_name;
    public $cure_purchase_price;
    public $cure_selling_price;

    public function searchCure()
    {
        $query = [
            'code' => $this->cure_code,
            'name' => $this->cure_name,
            'purchase_price' => $this->cure_purchase_price,
            'selling_price' => $this->cure_selling_price,
        ];
        $this->emit('search:cure', $query);
    }
    
    public function render()
    {
        return view('livewire.cure.search-cure-form');
    }
}
