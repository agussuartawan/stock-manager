@section('title', 'Obat Masuk')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Obat Masuk</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('purchases.index') }}">Data Obat Masuk</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Obat Masuk
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form multiple>
                    <livewire:purchase.purchase-main-form />

                    <hr>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hovered" style="min-width: 50rem">
                                    <livewire:purchase.purchase-detail-form />

                                    <livewire:purchase.purchase-detail-table />
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- modal search supplier --}}
    <div class="modal fade" id="modal-search-supplier" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
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
                                    <tr>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>No Telp</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @livewire('supplier.search-supplier-form')

                                    @livewire('supplier.search-supplier-table')
                                </tbody>
                            </table>

                        </div>
                    </div>
                    @livewire('supplier.search-supplier-form')
                </div>
            </div>
        </div>
    </div>

    {{-- modal search cures --}}
    <div class="modal fade" id="modal-search-cure" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
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
                                    <tr>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @livewire('cure.search-cure-form')

                                    @livewire('cure.search-cure-table')
                                </tbody>
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
    <script src="/assets/extensions/sweetalert2/sweetalert2.min.js"></script>
    <script>
        const modalSearchSupplier = new bootstrap.Modal(document.getElementById("modal-search-supplier"), {})
        const btnSearchSupplier = document.getElementById("btn-search-supplier")

        const modalSearchCure = new bootstrap.Modal(document.getElementById("modal-search-cure"), {})
        const btnSearchCure = document.getElementById("btn-search-cure")

        btnSearchSupplier.addEventListener("click", event => {
            event.preventDefault()
            myModal.show()
        })

        window.addEventListener('modal-show-supplier', event => {
            modalSearchSupplier.show()
        })

        window.addEventListener('modal-hide-supplier', event => {
            modalSearchSupplier.hide()
        })

        window.addEventListener('modal-show-cure', event => {
            modalSearchCure.show()
        })

        window.addEventListener('modal-hide-cure', event => {
            modalSearchCure.hide()
        })

        const alertSuccess = (message) => {
            Swal.fire(
                "Berhasil",
                message,
                "success"
            )
        }

        const alertError = (message) => {
            Swal.fire(
                "Gagal",
                message,
                "error"
            )
        }
    </script>
@endpush
