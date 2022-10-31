@section('title', 'Detail Obat Keluar')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detail Obat Keluar</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('sales.index') }}">Data Obat Keluar</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Obat Keluar
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>Invoice Penjualan</h4>
                <a href="{{ route('report.sale.invoice', $sale->id) }}" target="_blank"
                    class="btn btn-danger">Print</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card border border-2 border-dark p-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <h6>Dari :</h6>
                                            </div>
                                            <div class="col-lg-10">
                                                <h6>{{ $sale->supplier->name }}</h6>
                                                <h6>{{ $sale->supplier->address }}, Telp:
                                                    {{ $sale->supplier->phone }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card border border-2 border-dark p-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <h6>Invoice No. :</h6>
                                            </div>
                                            <div class="col-lg-9">
                                                <h6>{{ $sale->code }}</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3">
                                                <h6>Tanggal :</h6>
                                            </div>
                                            <div class="col-lg-9">
                                                <h6>{{ $sale->date }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Kode Obat</th>
                            <th>Nama Obat</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sale->cure as $cure)
                            <tr>
                                <td>{{ $cure->code }}</td>
                                <td>{{ $cure->name }}</td>
                                <td>{{ $cure->pivot->qty }}</td>
                                <td>{{ idr($cure->pivot->price) }}</td>
                                <td>{{ idr($cure->pivot->subtotal) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4" class="text-end">Total</th>
                            <th>{{ idr($sale->grand_total) }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>
</div>
