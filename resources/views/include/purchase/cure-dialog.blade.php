@extends('layouts.popup')

@section('title', 'Cari Data Obat')

@section('content')
    <div class="row">
        <div class="col-lg-3">
            <form action="/search-cure" method="GET">
                <input type="search" class="form-control" placeholder="Cari nama obat lalu tekan enter" name="search">
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered table-hovered">
                <thead>
                    <tr>
                        <th>Kode Obat</th>
                        <th>Nama Obat</th>
                        <th>Harga Obat</th>
                        <th>Sisa Stok</th>
                        <th>#</th>
                    </tr>
                </thead>
        
                <tbody>
                    @foreach ($cures as $cure)
                        <tr>
                            <td>{{ $cure->code }}</td>
                            <td>{{ $cure->name }}</td>
                            <td>{{ $cure->price }}</td>
                            <td>{{ $cure->stock }}</td>
                            <td><a href="#"><span class="badge rounded-pill bg-primary">pilih</span></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection