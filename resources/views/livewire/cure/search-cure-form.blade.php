<tr>
    <form wire:submit.prevent="searchCure">
        <td>
            <input type="text" class="form-control" wire:model.defer="cure_code" placeholder="Cari kode obat">
        </td>

        <td>
            <input type="text" class="form-control" wire:model.defer="cure_name" placeholder="Cari nama obat">
        </td>

        <td>
            <input type="text" class="form-control" wire:model.defer="cure_purchase_price"
                placeholder="Cari harga beli obat">
        </td>

        <td>
            <input type="text" class="form-control" wire:model.defer="cure_selling_price"
                placeholder="Cari harga jual obat">
        </td>
        <td>
            <input type="submit" hidden>
            <div class="spinner-border text-primary" role="status" wire:loading>
                <span class="visually-hidden">Loading...</span>
            </div>
        </td>
    </form>
</tr>
