@section('title', 'Obat Masuk')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Obat Masuk</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Obat Masuk
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <livewire:purchase.purchases-table />
    </section>

    @include('include.modal-xl')
    @include('include.modal-search')
</div>

@push('css')
    <link rel="stylesheet" href="/assets/extensions/sweetalert2/sweetalert2.min.css">
@endpush

@push('js')
    <script src="/assets/extensions/sweetalert2/sweetalert2.min.js"></script>
    <script>
        const myModalXl = new bootstrap.Modal(document.getElementById("modal-xl"), {})
        const myModal = new bootstrap.Modal(document.getElementById("modal-search"), {})
        const btnSearchSupplier = document.getElementById("btn-search-supplier")

        btnSearchSupplier.addEventListener("click", event => {
            event.preventDefault()
            myModal.show()
        })

        window.addEventListener('modal-show', event => {
            myModalXl.show()
        })

        window.addEventListener('modal-hide', event => {
            myModalXl.hide()
            Swal.fire(
                "Berhasil",
                "Data obat masuk berhasil disimpan.",
                "success"
            )
        })
    </script>
@endpush
