<?php

namespace App\Http\Livewire\Cure;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use App\Models\Cure;

class CuresTable extends DataTableComponent
{
    protected $model = Cure::class;

    protected $listeners = ['refresh:table' => 'refresh'];

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

    public function refresh()
    {
        $this->setRefreshMethod('refresh');
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
                ->sortable(),

            Column::make("Stok Minimal", "minimum_stock")
                ->sortable(),

            Column::make("Unit", "cureUnit.name")
                ->sortable(),

            Column::make("Harga Beli", "purchase_price")
                ->sortable(),

            Column::make("Harga Jual", "selling_price")
                ->sortable(),

            Column::make("Rak", "rack.name")
                ->sortable(),

            Column::make("Jenis", "cureType.name")
                ->sortable(),

            LinkColumn::make('Aksi')
                ->title(fn ($row) => 'edit')
                ->location(fn ($row) => route('cures.edit', $row))
                ->attributes(fn ($row) => [
                    'class' => 'badge rounded-pill bg-primary',
                    'title' => 'Edit ' . $row->code
                ]),
        ];
    }
}