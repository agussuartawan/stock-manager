<?php

namespace App\Http\Livewire\Sale;

use App\Events\CureSaleChanged;
use App\Models\Cure;
use App\Models\CureSale;
use App\Models\Stock;
use App\Models\TemporarySale;
use App\Rules\CheckStockAmountRule;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SaleDetailForm extends Component
{
    public $cure_id, $qty, $price, $cure_name, $stock_id;
    public $buttonLabel = 'Tambah';
    public $buttonAction = 'storeTemporaryDetail';
    public $sale;

    protected $messages = [
        'cure_id.required' => 'Obat tidak boleh kosong',
        'qty.required' => 'Jumlah tidak boleh kosong',
        'price.required' => 'Harga tidak boleh kosong',
    ];

    protected $listeners = [
        'edit:detail' => 'editDetail',
        'delete:detail' => 'deleteDetail',

        'edit:temporaryDetail' => 'editTemporaryDetail',
        'delete:temporaryDetail' => 'deleteTemporaryDetail',

        'choose:cure' => 'chooseCure'
    ];

    public function rules()
    {
        return [
            'cure_id' => ['required'],
            'qty' => ['required', new CheckStockAmountRule($this->cure_id)],
            'price' => ['required'],
        ];
    }

    public function chooseCure(Cure $cure)
    {
        $this->cure_id = $cure->id;
        $this->cure_name = $cure->name;
        $this->price = rounded($cure->selling_price);
        $this->dispatchBrowserEvent('modal-hide-cure');
    }

    public function storeTemporaryDetail()
    {
        $this->validate();

        TemporarySale::create([
            'cure_id' => $this->cure_id,
            'qty' => $this->qty,
            'price' => $this->price,
        ]);
        $this->emit('refreshTableDetail', []);
        $this->resetForm();
    }

    public function editTemporaryDetail(TemporarySale $temporarySale)
    {
        $this->cure_id = $temporarySale->cure_id;
        $this->qty = $temporarySale->qty;
        $this->price = round($temporarySale->price);
        $this->cure_name = $temporarySale->cure->name;
        $this->buttonAction = 'updateTemporaryDetail(' . $temporarySale->id . ')';
        $this->buttonLabel = 'Edit';
    }

    public function updateTemporaryDetail(TemporarySale $temporarySale)
    {
        $this->validate();
        $temporarySale->update([
            'cure_id' => $this->cure_id,
            'qty' => $this->qty,
            'price' => $this->price,
        ]);
        $this->resetForm();
        $this->emit('refreshTableDetail', []);
        $this->buttonLabel = 'Tambah';
        $this->buttonAction = 'storeTemporaryDetail';
    }

    public function deleteTemporaryDetail(TemporarySale $temporarySale)
    {
        $temporarySale->delete();
        $this->emit('refreshTableDetail', []);
    }


    public function storeDetail()
    {
        $this->validate();

        DB::transaction(function () {
            CureSale::create([
                'sale_id' => $this->sale['id'],
                'cure_id' => $this->cure_id,
                'qty' => $this->qty,
                'price' => $this->price,
            ]);
            event(new CureSaleChanged($this->sale));
        });
        $this->emit('refreshTableDetail', $this->sale);
        $this->resetForm();
    }

    public function editDetail($id)
    {
        $saleDetail = CureSale::where('id', $id)->where('sale_id', $this->sale['id'])->first();
        $this->cure_id = $saleDetail->cure_id;
        $this->qty = $saleDetail->qty;
        $this->price = round($saleDetail->price);
        $this->cure_name = $saleDetail->cure->name;
        $this->buttonAction = 'updateDetail(' . $saleDetail->id . ')';
        $this->buttonLabel = 'Edit';
    }

    public function updateDetail($id)
    {
        $this->validate();
        $saleDetail = Curesale::where('id', $id)->where('sale_id', $this->sale['id'])->first();

        DB::transaction(function () use ($saleDetail) {
            $saleDetail->update([
                'sale_id' => $this->sale['id'],
                'cure_id' => $this->cure_id,
                'qty' => $this->qty,
                'price' => $this->price,
            ]);
            event(new CureSaleChanged($this->sale));
        });

        $this->resetForm();
        $this->emit('refreshTableDetail', $this->sale);
        $this->buttonLabel = 'Tambah';
        $this->buttonAction = 'storeDetail';
    }

    public function deleteDetail(Curesale $cureSale)
    {
        DB::transaction(function () use ($cureSale) {
            $cureSale->delete();
            event(new CureSaleChanged($this->sale));
        });
        $this->emit('refreshTableDetail', $this->sale);
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        if ($this->sale) {
            $this->buttonAction = "storeDetail";
        }
    }

    public function render()
    {
        return view('livewire.sale.sale-detail-form');
    }

    public function resetForm()
    {
        $this->cure_id = null;
        $this->qty = null;
        $this->price = null;
        $this->cure_code = null;
        $this->cure_name = null;
    }
}
