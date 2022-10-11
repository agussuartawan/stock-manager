<form>
    <div class="mb-3">
        <label for="name" class="form-label">Nama Rak</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" wire:model="name">
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</form>
