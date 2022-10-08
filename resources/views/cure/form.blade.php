@extends('layouts.app')

@section('title', 'Tambah Obat')
@section('content')
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
                        <li class="breadcrumb-item"><a href="{{ route('cures.index') }}">Master Obat</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $breadcumb }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card mb-3">
            <div class="card-body pb-1">
                {!! Form::model($cure, [
                'route' => $route,
                'method' => $method,
                'id' => 'form-cure',
                ]) !!}
                
                <div class="mb-3">
                    <label for="code">{{ __('Kode Obat') }}</label>
                    {!! Form::text('code', null, ['class' => 'form-control', 'id' => 'code']) !!}
                </div>
                
                <div class="mb-3">
                    <label for="name">{{ __('Nama Obat') }}</label>
                    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
                </div>
                
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="cure_type_id">{{ __('Jenis Obat') }}</label>
                            {!! Form::select('cure_type_id', $cure_type, null, ['class' => 'form-control form-select', 'id' =>
                            'cure_type_id']) !!}
                        </div>
                
                        <div class="col">
                            <label for="cure_unit_id">{{ __('Unit') }}</label>
                            {!! Form::select('cure_unit_id', $cure_unit, null, ['class' => 'form-control form-select', 'id' =>
                            'cure_unit_id']) !!}
                        </div>
                
                        <div class="col">
                            <label for="rack_id">{{ __('Rak') }}</label>
                            {!! Form::select('rack_id', $rack, null, ['class' => 'form-control form-select', 'id' => 'rack_id']) !!}
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="minimum_stock">{{ __('Stok Minimum') }}</label>
                    {!! Form::number('minimum_stock', null, ['class' => 'form-control', 'id' => 'minimum_stock']) !!}
                </div>
                
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="purchase_price">{{ __('Harga Jual') }}</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Rp.</span>
                                {!! Form::text('purchase_price', null, ['class' => 'form-control', 'id' => 'purchase_price']) !!}
                            </div>

                        </div>
                        
                        <div class="col">
                            <label for="selling_price">{{ __('Harga Beli') }}</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Rp.</span>
                                {!! Form::text('selling_price', null, ['class' => 'form-control', 'id' => 'selling_price']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <a href="{{ route('cures.index') }}" class="btn btn-secondary me-2">
                <i class="bi bi-caret-left-square-fill"></i>
                Kembali
            </a>
            <button class="btn btn-primary" type="submit">
                <i class="bi bi-cloud-arrow-up-fill"></i>
                Simpan
            </button>
        </div>
        {!! Form::close() !!}
    </section>
</div>
@endsection
@push('js')
    <script>
        var purchaseInput = document.getElementById("purchase_price");
        var sellingInput = document.getElementById("selling_price");

        purchaseInput.onfocus = () => {
            purchaseInput.select();
        }

        purchaseInput.onkeyup = () => {
            updateTextView(purchaseInput)
        };

        sellingInput.onfocus = () => {
            sellingInput.select();
        }

        sellingInput.onkeyup = () => {
            updateTextView(sellingInput)
        };

        updateTextView = (_obj) => {
            var value = _obj.value
            var num = getNumber(value)
            if(num == 0){
                _obj.value = ''
            }else{
                _obj.value = num.toLocaleString();
            }
        }

        getNumber = (_str) => {
            var arr = _str.split('');
            var out = new Array();
            for(var cnt = 0; cnt < arr.length ; cnt++){
                if(isNaN(arr[cnt]) == false){
                    out.push(arr[cnt]); 
                } 
            }
            return Number(out.join('')); 
        }
    </script>
@endpush