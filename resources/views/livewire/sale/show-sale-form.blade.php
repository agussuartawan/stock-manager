@section('title', 'Obat Keluar')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{ $title }}</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('sales.index') }}">Data Obat Keluar</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Obat Keluar
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil..</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form>
                    <livewire:sale.sale-main-form :sale="$sale" />

                    <hr>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hovered" style="min-width: 50rem">
                                    <livewire:sale.sale-detail-form :sale="$sale" />

                                    <livewire:sale.sale-detail-table :sale="$sale" />
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary" wire:click.prevent="{{ $emitAction }}">Simpan
                            Transaksi</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- modal search customer --}}
    <div class="modal fade" id="modal-search-customer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Cari Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-bordered">
                                <thead>
                                    @livewire('customer.search-customer-form')
                                </thead>
                                <tbody>
                                    @livewire('customer.search-customer-table')
                                </tbody>
                            </table>

                        </div>
                    </div>
                    @livewire('customer.search-customer-form')
                </div>
            </div>
        </div>
    </div>

    {{-- modal search cures --}}
    <div class="modal fade" id="modal-search-cure" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Cari Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-bordered">
                                <thead>
                                    @livewire('cure.search-cure-form')
                                </thead>
                                @livewire('cure.search-cure-table')
                            </table>

                        </div>
                    </div>
                    @livewire('cure.search-cure-form')
                </div>
            </div>
        </div>
    </div>


</div>

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('js')
    <script>
        const modalSearchCustomer = new bootstrap.Modal(document.getElementById("modal-search-customer"), {})

        const modalSearchCure = new bootstrap.Modal(document.getElementById("modal-search-cure"), {})

        window.addEventListener('modal-show-customer', event => {
            modalSearchCustomer.show()
        })

        window.addEventListener('modal-hide-customer', event => {
            modalSearchCustomer.hide()
        })

        window.addEventListener('modal-show-cure', event => {
            modalSearchCure.show()
        })

        window.addEventListener('modal-hide-cure', event => {
            modalSearchCure.hide()
        })

        window.addEventListener('alert-error', event => {
            alert("Terjadi kesalahan.")
        })
    </script>
@endpush
