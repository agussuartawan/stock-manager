<?php

namespace App\Http\Livewire\Purchase;

use App\Models\Cure;
use App\Models\TemporaryPurchase;
use Livewire\Component;

class PurchaseDetail extends Component
{
    public $cure_id, $qty, $price, $expired, $cure_code, $cure_name;

    protected $rules = [
        'cure_id' => ['required'],
        'qty' => ['required'],
        'price' => ['required'],
        'expired' => ['required'],
    ];

    protected $messages = [
        'cure_id' => 'Obat tidak boleh kosong',
        'qty' => 'Jumlah tidak boleh kosong',
        'price' => 'Harga tidak boleh kosong',
        'date' => 'Tanggal kedaluarsa tidak boleh kosong',
    ];

    public function store()
    {
        $this->validate();

        TemporaryPurchase::create([
            'cure_id' => $this->cure_id,
            'qty' => $this->qty,
            'price' => $this->price,
            'expired' => $this->expired,
        ]);
        $this->emit('refreshTableDetail');
    }

    public function setCureId($by_code)
    {
        if ($by_code) {
            $cure = Cure::where('code', $this->cure_code)->select('id', 'name')->first();
            if($cure){
                $this->cure_id = $cure->id;
                $this->cure_name = $cure->name;
            }
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.purchase.purchase-detail');
    }
}
