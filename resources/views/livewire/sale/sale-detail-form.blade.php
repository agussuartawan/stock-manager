<thead>
    <tr>
        <th>
            <label for="" class="form-label">Cari Obat</label>
            @error('cure_id') 
                <small class="text-danger" style="font-size: 11px;"><em>{{ $message }}</em></small>
            @enderror
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
            @error('qty') 
                <small class="text-danger" style="font-size: 11px;"><em>{{ $message }}</em></small>
            @enderror
            <div class="input-group">
                <input type="text" class="form-control @error('qty') is-invalid @enderror" id="qty"
                wire:model="qty" placeholder="Jumlah" @if($cure_id == NULL) disabled @endif>
            </div>
        </th>

        <th colspan="2">
            <label for="" class="form-label">Harga</label>
            @error('price') 
                <small class="text-danger" style="font-size: 11px;"><em>{{ $message }}</em></small>
            @enderror
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