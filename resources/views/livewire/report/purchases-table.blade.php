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
                    <th>Nama Obat</th>
                    <th>Qty</th>
                    <th>Tgl Kedaluarsa</th>
                    <th>Subtotal</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($purchases as $i => $purchase)

                @php
                $code = '';
                $cureCount = count($purchase->cure);
                @endphp

                @foreach ($purchase->cure as $k => $cure)
                <tr>
                    <td scope="row">{{ ($purchase->code != $code) ? $i + 1 : '' }}</td>
                    <td>{{ ($purchase->code != $code) ? $purchase->code : '' }}</td>
                    <td>{{ ($purchase->code != $code) ? $purchase->supplier->name : '' }}</td>
                    <td>{{ ($purchase->code != $code) ? $purchase->date : '' }}</td>
                    <td>{{ $cure->name }}</td>
                    <td>{{ $cure->pivot->qty }}</td>
                    <td>{{ \Carbon\Carbon::parse($cure->pivot->expired)->format('d/m/Y') }}</td>
                    <td>{{ idr($cure->pivot->subtotal) }}</td>
                    <td>{{ ($cureCount == $k + 1) ? idr($purchase->grand_total) : '' }}</td>
                </tr>

                @php
                $code = $purchase->code;
                @endphp

                @endforeach
                @empty
                <tr>
                    <td colspan="9" class="text-center">Tidak ada data pada tabel.</td>
                </tr>
                @endforelse
            </tbody>
            <tfoot class="bg-light">
                <tr>
                    <td colspan="8" class="text-end">Total</td>
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