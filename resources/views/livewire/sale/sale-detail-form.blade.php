<thead>
    <tr>
        <th>
            <label for="" class="form-label">Cari Obat</label>
            <div class="input-group">
                <input type="hidden" wire:model.defer="cure_id" id="cure_id">

                <input type="text" class="form-control @error('cure_id') is-invalid @enderror" id="cureName"
                    wire:model.defer="cure_name" placeholder="Cari Obat">

                <button class="input-group-text btn btn-secondary icon icon-left" id="btn-search-cure"
                    wire:click.prevent="$emit('show:modalCure')"><i class="bi bi-search"></i></button>
            </div>
        </th>

        <th>
            <label for="" class="form-label">Jumlah</label>
            <div class="input-group">
                <input type="text" class="form-control @error('qty') is-invalid @enderror" id="qty"
                    wire:model="qty" placeholder="Jumlah">
            </div>
        </th>

        <th colspan="2">
            <label for="" class="form-label">Harga</label>
            <div class="input-group">
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                    wire:model="price" placeholder="Harga jual">
            </div>
        </th>

        <th>
            <label for="" class="text-white form-label">Aksi</label>
            <div class="input-group">
                <button class="btn btn-primary" wire:click.prevent="{{ $buttonAction }}"
                    wire:loading.attr="disabled">{{ $buttonLabel }}</button>
            </div>
        </th>
    </tr>
</thead>
