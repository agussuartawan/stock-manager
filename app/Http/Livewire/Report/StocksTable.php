<?php

namespace App\Http\Livewire\Report;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Stock;

class StocksTable extends DataTableComponent
{
    protected $model = Stock::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setEmptyMessage('Tidak ada data')
            ->setDefaultSort('cure_id', 'desc')
            ->setTableAttributes([
                'class' => 'bg-white rounded-3 table-hover',
            ])
            ->setSortingPillsDisabled()
            ->setConfigurableAreas([
                'toolbar-right-start' => [
                    'include.btn-add', [
                        'action' => '/report/stocks/print',
                        'noEmit' => true,
                        'title' => 'Print'
                    ]
                ],
            ])
            ->setThAttributes(function (Column $column) {
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
            Column::make("Kode Obat", "cure.code")
                ->sortable()
                ->searchable(),
            Column::make("Nama Obat", "cure.name")
                ->sortable()
                ->searchable(),
            // Column::make("Posisi Rak", "cure.rack.name")
            //     ->sortable()
            //     ->searchable(),
            Column::make("Stock", "amount")
                ->sortable()
                ->searchable()
                ->format(function ($value) {
                    return idr($value);
                }),
        ];
    }
}