<?php

namespace App\Http\Livewire\Sale;

use App\Models\Customer;
use App\Models\Sale;
use App\Models\TemporarySale;
use Carbon\Carbon;
use Livewire\Component;

class SaleMainForm extends Component
{
    public $customer_id;
    public $customer_name;
    public $date;
    public $code;

    protected $listeners = [
        'choose:customer' => 'chooseCustomer',
        'save:transaction' => 'store',
        'edit:transaction' => 'update',
    ];

    protected $rules = [
        'customer_id' => ['required'],
        'date' => ['required'],
    ];

    protected $messages = [
        'customer_id.required' => 'Pelanggan tidak boleh kosong',
        'date.required' => 'Tanggal tidak boleh kosong'
    ];

    public function store()
    {
        $this->validate();
        // try {
        if (TemporarySale::where("user_id", auth()->user()->id)->exists()) {
            Sale::create([
                'customer_id' => $this->customer_id,
                'date' => $this->date,
            ]);
            return to_route('sales.create')->with('success', 'Data obat keluar berhasil disimpan');
        } else {
            $this->emit("alert:error");
        }
        // } catch (\Throwable $th) {
        //     $this->emit("alert:error");
        // }
    }

    public function update(Sale $sale)
    {
        $this->validate();
        try {
            if ($sale->cure()->exists()) {
                $sale->update([
                    'customer_id' => $this->customer_id,
                    'date' => $this->date,
                ]);
                return to_route('sales.create')->with('success', 'Data obat masuk berhasil disimpan');
            } else {
                $this->emit("alert:error");
            }
        } catch (\Throwable $th) {
            $this->emit("alert:error");
        }
    }

    public function chooseCustomer(Customer $customer)
    {
        $this->customer_id = $customer->id;
        $this->customer_name = $customer->name;
        $this->dispatchBrowserEvent('modal-hide-customer');
    }

    public function mount($sale)
    {
        if ($sale) {
            $this->customer_id = $sale->customer->id;
            $this->customer_name = $sale->customer->name;
            $this->date = Carbon::createFromFormat('d/m/Y', $sale->date)->format('Y-m-d');
            $this->code = $sale->code;
        } else {
            $this->customer_id = null;
            $this->customer_name = null;
            $this->date = date('Y-m-d');
            $this->code = Sale::getNextCode();
        }
    }

    public function render()
    {
        return view('livewire.sale.sale-main-form');
    }
}