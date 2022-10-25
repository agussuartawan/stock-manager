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
            Column::make("Kode Obat", "cure.code")
                ->sortable(),
            Column::make("Nama Obat", "cure.name")
                ->sortable(),
            Column::make("Posisi Rak", "cure.rack.name")
                ->sortable(),
            Column::make("Stock", "amount")
                ->sortable(),
            Column::make("Tgl Kedaluarsa", "expired_date")
                ->sortable(),
            // LinkColumn::make('Aksi')
            // ->title(fn ($row) => 'edit')
            // ->location(fn ($row) => '#')
            // ->attributes(fn ($row) => [
            //     'class' => 'badge rounded-pill bg-primary',
            //     'title' => 'Edit ' . $row->code,
            //     "wire:click" => '$emit(`edit:purchase`,' . $row->id . ')'
            // ])
        ];
    }
}
