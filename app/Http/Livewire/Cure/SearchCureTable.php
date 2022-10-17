<?php

namespace App\Http\Livewire\Cure;

use App\Models\Cure;
use Livewire\Component;

class SearchCureTable extends Component
{
    public $cures;

    protected $listeners = [
        'search:cure' => 'searchData'
    ];

    public function mount()
    {
        $this->cures = Cure::orderBy('created_at', 'desc')->take(10)->get();
    }

    public function searchData($query)
    {
        $this->cures = Cure::where('code', 'like', '%'.$query['code'].'%')
                    ->where('name', 'like', '%'.$query['name'].'%')
                    ->where('purchase_price', 'like', '%'.$query['purchase_price'].'%')
                    ->where('selling_price', 'like', '%'.$query['selling_price'].'%')
                    ->get();
        $this->render();
    }

    public function render()
    {
        return view('livewire.cure.search-cure-table', ['cures' => $this->cures]);
    }
}
