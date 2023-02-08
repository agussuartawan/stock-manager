@extends('layouts.report')

@section('title', 'Laporan Stok Obat')
@section('content')
<div class="card mt-3 mb-0">
    <div class="card-title">
        <h4 class="text-center">Laporan Obat Keluar</h4>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
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
                    <th scope="row">{{ ($code != $sale->code) ? $i + 1 : '' }}</th>
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
            <tfoot>
                <tr>
                    <th colspan="7" class="text-end">Total</th>
                    <th>{{ idr($sales->sum('grand_total')) }}</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection