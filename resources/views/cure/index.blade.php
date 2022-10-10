@extends('layouts.app')

@section('title', 'Master Obat')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Master Obat</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Master Obat
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <livewire:cures-table />
        </section>
        
        <livewire:show-table />
    </div>
    @if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                Swal.fire(
                    "Berhasil",
                    "{{ session('success') }}",
                    "success"
                )
            });
        </script>
    @endif
@endsection

@push('css')
    <link rel="stylesheet" href="/assets/extensions/sweetalert2/sweetalert2.min.css">
@endpush

@push('js')
    <script src="/assets/extensions/sweetalert2/sweetalert2.min.js"></script>
@endpush