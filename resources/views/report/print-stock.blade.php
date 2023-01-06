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
                    </tr>
                </thead>
                <tbody>
                    @forelse ($stocks as $i => $stock)
                        <tr>
                            <th scope="row">{{ $i + 1 }}</th>
                            <td>{{ $stock->cure->code }}</td>
                            <td>{{ $stock->cure->name }}</td>
                            <td>{{ $stock->cure->rack->implode('name', ', ') }}</td>
                            <td>{{ $stock->amount }}</td>
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
                        <th>{{ idr($stocks->sum('amount')) }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
