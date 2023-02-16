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
                    <th scope="col">No.</th>
                    <th>Kode Penjualan</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th>Tanggal</th>
                    <th>Nama Obat</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($sales as $i => $sale)

                @php
                $code = '';
                $cureCount = count($sale->cure);
                @endphp

                @foreach ($sale->cure as $k => $cure)
                <tr>
                    <td scope="row">{{ ($code != $sale->code) ? $i + 1 : '' }}</td>
                    <td>{{ ($code != $sale->code) ? $sale->code : '' }}</td>
                    <td>{{ ($code != $sale->code) ? $sale->customer->name : '' }}</td>
                    <td>{{ ($code != $sale->code) ? $sale->date : '' }}</td>
                    <td>{{ $cure->name }}</td>
                    <td>{{ $cure->pivot->qty }}</td>
                    <td>{{ idr($cure->pivot->subtotal) }}</td>
                    <td>{{ ($cureCount == $k + 1) ? idr($sale->grand_total) : '' }}</td>
                </tr>

                @php
                $code = $sale->code;
                @endphp

                @endforeach

                @empty
                <tr>
                    <td colspan="8" class="text-center">Tidak ada data pada tabel.</td>
                </tr>
                @endforelse
            </tbody>
            <tfoot class="bg-light">
                <tr>
                    <td colspan="7" class="text-end">Total</td>
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