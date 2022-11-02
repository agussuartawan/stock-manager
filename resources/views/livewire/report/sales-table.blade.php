<div class="row">
    <div class="d-flex justify-content-center">
        <div class="spinner-border" role="status" wire:loading>
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <div class="col-lg-12" wire:loading.remove>
        <table class="table p-0 bg-white rounded-4">
            <thead class="bg-light">
                <tr>
                    <th>No.</th>
                    <th>Kode Penjualan</th>
                    <th>Pelanggan</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($sales as $key => $sale)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $sale->code }}</td>
                        <td>{{ $sale->customer->name }}</td>
                        <td>{{ $sale->date }}</td>
                        <td>{{ idr($sale->grand_total) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data pada tabel.</td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot class="bg-light">
                <tr>
                    <td colspan="4" class="text-end">Total</td>
                    <td>
                        @if ($sales)
                            {{ idr($sales->sum('grand_total')) }}
                        @else
                            0
                        @endif
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
