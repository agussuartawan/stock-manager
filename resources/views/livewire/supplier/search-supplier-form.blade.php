<tr>
    <form wire:submit.prevent="searchSupplier">
        <td>
            <input type="text" class="form-control" wire:model.defer="supplier_name" placeholder="Cari nama supplier">
        </td>

        <td>
            <input type="text" class="form-control" wire:model.defer="supplier_address"
                placeholder="Cari alamat supplier">
        </td>

        <td>
            <input type="text" class="form-control" wire:model.defer="supplier_phone"
                placeholder="Cari nomor telp supplier">
        </td>
        <td>
            <input type="submit" hidden>
            <div class="spinner-border text-primary" role="status" wire:loading>
                <span class="visually-hidden">Loading...</span>
            </div>
        </td>
    </form>
</tr>
