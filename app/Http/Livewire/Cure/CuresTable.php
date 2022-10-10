<?php

namespace App\Http\Livewire\Cure;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use App\Models\Cure;

class CuresTable extends DataTableComponent
{
    protected $model = Cure::class;

    protected $listeners = ['refresh:table' => '$refresh'];

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setEmptyMessage('Tidak ada data')
            ->setDefaultSort('id', 'desc')
            ->setTableAttributes([
                'class' => 'bg-white rounded-3 table-hover',
            ])
            ->setSortingPillsDisabled()
            ->setConfigurableAreas([
                'toolbar-right-start' => [
                    'include.btn-add', [
                        'action' => '$emit("create:cure")'
                    ]
                ],
            ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),

            Column::make("Kode", "code")
                ->sortable()
                ->searchable(),

            Column::make("Nama", "name")
                ->sortable()
                ->searchable(),

            Column::make("Stok Minimal", "minimum_stock")
                ->sortable()
                ->searchable(),

            Column::make("Unit", "cureUnit.name")
                ->sortable()
                ->searchable(),

            Column::make("Harga Beli", "purchase_price")
                ->sortable()
                ->searchable(),

            Column::make("Harga Jual", "selling_price")
                ->sortable()
                ->searchable(),

            Column::make("Rak", "rack.name")
                ->sortable()
                ->searchable(),

            Column::make("Jenis", "cureType.name")
                ->sortable()
                ->searchable(),

            LinkColumn::make('Aksi')
                ->title(fn ($row) => 'edit')
                ->location(fn ($row) => '#')
                ->attributes(fn ($row) => [
                    'class' => 'badge rounded-pill bg-primary',
                    'title' => 'Edit ' . $row->code,
                    "wire:click" => '$emit(`edit:cure`,' . $row->id . ')'
                ]),
        ];
    }
}