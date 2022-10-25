@extends('layouts.report')

@section('title', 'Laporan Stok Obat')
@section('content')
    <div class="card mt-3 mb-0">
        <div class="card-title">
            <h4 class="text-center">Laporan Stok Obat</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th>Kode Obat</th>
                        <th scope="col">Nama Obat</th>
                        <th>Posisi Rak</th>
                        <th scope="col">Sisa Stok</th>
                        <th scope="col">Tgl Kedaluarsa</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($stocks as $i => $stock)
                        <tr>
                            <th scope="row">{{ $i + 1 }}</th>
                            <td>{{ $stock->cure->code }}</td>
                            <td>{{ $stock->cure->name }}</td>
                            <td>{{ $stock->cure->rack->name }}</td>
                            <td>{{ $stock->amount }}</td>
                            <td>{{ dateFormat($stock->expired_date) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data pada tabel.</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" class="text-end">Total</th>
                        <th>{{ idr($stocks->sum('amount')) }}</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
