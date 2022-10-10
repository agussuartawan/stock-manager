<form>
    <div class="mb-3">
        <label for="code" class="form-label">Kode Obat</label>
        <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" wire:model="code" disabled>
        @error('code')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Nama Obat</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" wire:model="name">
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="cure_type_id" class="form-label">Jenis</label>
                <select class="form-select @error('cure_type_id') is-invalid @enderror" wire:model="cure_type_id" aria-label="Default select example">
                    <option>Pilih Jenis</option>
                    @foreach ($cure_types as $cure_type)
                        <option wire:key="cure-type-{{ $cure_type->id }}" value="{{ $cure_type->id }}">{{ $cure_type->name }}</option>
                    @endforeach
                </select>
                @error('cure_type_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="cure_unit_id" class="form-label">Unit</label>
                <select class="form-select @error('cure_unit_id') is-invalid @enderror" wire:model="cure_unit_id" aria-label="Default select example">
                    <option>Pilih Unit</option>
                    @foreach ($cure_units as $cure_unit)
                        <option wire:key="cure-unit-{{ $cure_unit->id }}" value="{{ $cure_unit->id }}">{{ $cure_unit->name }}</option>
                    @endforeach
                </select>
                @error('cure_unit_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="col">
            <div class="mb-3">
                <label for="rack_id" class="form-label">Rak</label>
                <select class="form-select @error('rack_id') is-invalid @enderror" wire:model="rack_id" aria-label="Default select example">
                    <option>Pilih Rak</option>
                    @foreach ($racks as $rack)
                        <option wire:key="rack-{{ $rack->id }}" value="{{ $rack->id }}">{{ $rack->name }}</option>
                    @endforeach
                </select>
                @error('rack_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label for="minimum_stock" class="form-label">Stok Minimum</label>
        <input type="number" class="form-control @error('minimum_stock') is-invalid @enderror" id="minimum_stock" wire:model="minimum_stock">
        @error('minimum_stock')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="purchase_price" class="form-label">Harga Beli</label>
        <input class="form-control @error('purchase_price') is-invalid @enderror" id="purchase_price" wire:model="purchase_price" x-mask:dynamic="$money($input)">
        @error('purchase_price')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="selling_price" class="form-label">Harga Jual</label>
        <input class="form-control @error('selling_price') is-invalid @enderror" id="selling_price" wire:model="selling_price" x-mask:dynamic="$money($input)">
        @error('selling_price')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</form>