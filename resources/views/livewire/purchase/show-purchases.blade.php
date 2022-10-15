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
    <div id="dialog"></div>
</div>

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('js')
    <script src="/assets/extensions/sweetalert2/sweetalert2.min.js"></script>
    <script>
        const myModalXl = new bootstrap.Modal(document.getElementById("modal-xl"), {})
        const myModal = new bootstrap.Modal(document.getElementById("modal-search"), {})
        const btnSearchSupplier = document.getElementById("btn-search-supplier")
        const cureCodeInput = document.getElementById('cureCode')

        btnSearchSupplier.addEventListener("click", event => {
            event.preventDefault()
            myModal.show()
        })

        window.addEventListener('modal-show', event => {
            myModalXl.show()
        })

        window.addEventListener('modal-hide', event => {
            myModalXl.hide()
            alertSuccess('Data obat masuk berhasil disimpan.')
        })

        window.addEventListener('code-not-found', event => {
            cureCodeInput.focus()
            alertError('Kode obat tidak ditemukan!')
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

        document.getElementById("btn-search-cure").addEventListener("click", function(event){
            event.preventDefault()
            window.open('/search-cure','popUpWindow','height=400,width=800,left=200,top=200,resizable=no,scrollbars=no,toolbar=no,menubar=no,location=no,directories=no, status=no')
        });
    </script>
@endpush
