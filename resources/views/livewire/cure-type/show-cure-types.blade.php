@section('title', 'Jenis Obat')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Jenis Obat</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Jenis Obat
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <livewire:cure-type.cure-types-table />
    </section>

    @include('include.modal')
</div>

@push('css')
    <link rel="stylesheet" href="/assets/extensions/sweetalert2/sweetalert2.min.css">
@endpush

@push('js')
    <script src="/assets/extensions/sweetalert2/sweetalert2.min.js"></script>
    <script>
        var myModal = new bootstrap.Modal(document.getElementById("modal"), {})
        window.addEventListener('modal-show', event => {
            myModal.show()
        })

        window.addEventListener('modal-hide', event => {
            myModal.hide()
            Swal.fire(
                "Berhasil",
                "Data jenis obat berhasil disimpan.",
                "success"
            )
        })
    </script>
@endpush
