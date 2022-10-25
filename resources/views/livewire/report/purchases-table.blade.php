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
                    <th>Kode Pembelian</th>
                    <th>Supplier</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($purchases as $key => $purchase)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $purchase->code }}</td>
                        <td>{{ $purchase->supplier->name }}</td>
                        <td>{{ $purchase->date }}</td>
                        <td>{{ idr($purchase->grand_total) }}</td>
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
                        @if ($purchases)
                            {{ idr($purchases->sum('grand_total')) }}
                        @else
                            0
                        @endif
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
