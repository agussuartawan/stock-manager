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
                        <th>Tanggal</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($purchases as $i => $purchase)
                        <tr>
                            <th scope="row">{{ $i + 1 }}</th>
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
                <tfoot>
                    <tr>
                        <th colspan="4" class="text-end">Total</th>
                        <th>{{ idr($purchases->sum('grand_total')) }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
