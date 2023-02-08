@extends('layouts.report')

@section('title', 'Laporan Stok Obat')
@section('content')
<div class="card mt-3 mb-0">
    <div class="card-title">
        <h4 class="text-center">Laporan Obat Masuk</h4>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th>Kode Pembelian</th>
                    <th scope="col">Nama Supplier</th>
                    <th>Tgl</th>
                    <th>Nama Obat</th>
                    <th>Qty</th>
                    <th>Tgl Kedaluarsa</th>
                    <th>Subtotal</th>
                    <th scope="col">Total</th>
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
                    <th scope="row">{{ ($purchase->code != $code) ? $i + 1 : '' }}</th>
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
            <tfoot>
                <tr>
                    <th colspan="8" class="text-end">Total</th>
                    <th>{{ idr($purchases->sum('grand_total')) }}</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection