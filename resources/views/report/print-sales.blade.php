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
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sales as $i => $sale)
                        <tr>
                            <th scope="row">{{ $i + 1 }}</th>
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
                <tfoot>
                    <tr>
                        <th colspan="4" class="text-end">Total</th>
                        <th>{{ idr($sales->sum('grand_total')) }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
