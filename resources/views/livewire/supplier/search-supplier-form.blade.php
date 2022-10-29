<tr>
    <form wire:submit.prevent="searchSupplier">
        <th>
            <input type="text" class="form-control" wire:model.defer="supplier_name" placeholder="Cari nama supplier">
        </th>

        <th>
            <input type="text" class="form-control" wire:model.defer="supplier_address"
                placeholder="Cari alamat supplier">
        </th>

        <th>
            <input type="text" class="form-control" wire:model.defer="supplier_phone"
                placeholder="Cari nomor telp supplier">
        </th>
        <th>
            <input type="submit" hidden>
            <div class="spinner-border text-primary" role="status" wire:loading>
                <span class="visually-hidden">Loading...</span>
            </div>
        </th>
    </form>
</tr>
