<?php

namespace App\Http\Livewire\Unit;

use App\Models\CureUnit;
use Livewire\Component;


class ShowUnitForm extends Component
{
    public $name;

    protected $rules = [
        'name' => ['required']
    ];

    protected $messages = [
        'name.required' => 'Nama satuan tidak boleh kosong'
    ];

    protected $listeners = [
        'showEdit:unit' => 'edit',
        'modal:close' => 'modalClose',
        'store:unit' => 'store',
        'update:unit' => 'update',
    ];

    public function edit(CureUnit $cureUnit)
    {
        $this->name = $cureUnit->name;
    }

    public function resetForm()
    {
        $this->name = '';
    }

    public function modalClose()
    {
        $this->resetForm();
    }

    public function store()
    {
        CureUnit::create($this->validate());
        $this->emit('refresh:table');
        $this->dispatchBrowserEvent('modal-hide');
        $this->resetForm();
    }

    public function update(CureUnit $cureUnit)
    {
        $cureUnit->update($this->validate());
        $this->emit('refresh:table');
        $this->dispatchBrowserEvent('modal-hide');
        $this->resetForm();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.unit.show-unit-form');
    }
}
