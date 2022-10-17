<?php

namespace App\Http\Livewire\Purchase;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use App\Models\Purchase;

class PurchasesTable extends DataTableComponent
{
    protected $model = Purchase::class;

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
                        'action' => '/purchases/create'
                    ]
                ],
            ])            
            ->setThAttributes(function(Column $column) {
                if ($column->isField('Aksi')) {
                  return [
                    'width' => '10%',
                  ];
                }
            
                return [];
            });
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Kode Obat Masuk", "code")
                ->sortable()
                ->searchable(),
            Column::make("Nama Supplier", "supplier.name")
                ->sortable()
                ->searchable(),
            Column::make("Tanggal", "date")
                ->sortable()
                ->searchable(),
            LinkColumn::make('Aksi')
            ->title(fn ($row) => 'edit')
            ->location(fn ($row) => '#')
            ->attributes(fn ($row) => [
                'class' => 'badge rounded-pill bg-primary',
                'title' => 'Edit ' . $row->code,
                "wire:click" => '$emit(`edit:purchase`,' . $row->id . ')'
            ]),
        ];
    }
}
