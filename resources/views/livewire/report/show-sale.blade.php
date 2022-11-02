@section('title', 'Obat Masuk')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Laporan Obat Keluar</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Laporan Obat Keluar
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">Cari laporan obat keluar</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-center mb-3">
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label for="from" class="col-form-label">Dari :</label>
                                </div>

                                <div class="col-auto">
                                    <input type="date" id="from" wire:model.defer="from"
                                        class="form-control @error('from') is-invalid @enderror">
                                </div>

                                <div class="col-auto">
                                    <label for="until" class="col-form-label">Sampai :</label>
                                </div>

                                <div class="col-auto">
                                    <input type="date" id="until" wire:model.defer="until"
                                        class="form-control @error('until') is-invalid @enderror">
                                </div>

                                <div class="col-auto">
                                    <button wire:click.prevent="search" class="btn icon btn-secondary"><i
                                            class="bi bi-search"></i></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <div class="spinner-border" role="status" wire:loading>
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>

                        @if ($sales)
                            <div class="d-flex justify-content-center">
                                <a href="#" class="btn btn-danger" wire:loading.remove
                                    onclick="submit()">Print</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @if ($sales)
            <livewire:report.sales-table />
        @endif
    </section>
</div>
@push('js')
    <script>
        function submit() {
            const from = document.getElementById('from');
            const until = document.getElementById('until');
            window.open(`{{ url('/report/sales/print?') }}from=${from.value}&until=${until.value}`, '_blank');
        }
    </script>
@endpush
