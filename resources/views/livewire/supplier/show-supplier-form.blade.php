<form>
    <div class="mb-3">
        <label for="name" class="form-label">Nama Supplier</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" wire:model="name">
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="address" class="form-label">Alamat Supplier</label>
        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
            wire:model="address">
        @error('address')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">No. Telp Supplier</label>
        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
            wire:model="phone">
        @error('phone')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</form>
