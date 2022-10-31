@section('title', 'Obat Keluar')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Obat Keluar</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Obat Keluar
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <livewire:sale.sales-table />
    </section>
</div>
@push('js')
    <script src="/assets/extensions/sweetalert2/sweetalert2.min.js"></script>
    <script>
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
