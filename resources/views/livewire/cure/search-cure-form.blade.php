<tr>
    <form wire:submit.prevent="searchCure">
        <th>
            <input type="text" class="form-control" wire:model.defer="cure_code" placeholder="Cari kode obat">
        </th>

        <th>
            <input type="text" class="form-control" wire:model.defer="cure_name" placeholder="Cari nama obat">
        </th>

        <th>
            <input type="text" class="form-control" wire:model.defer="cure_purchase_price"
                placeholder="Cari harga beli obat">
        </th>

        <th>
            <input type="text" class="form-control" wire:model.defer="cure_selling_price"
                placeholder="Cari harga jual obat">
        </th>
        <th>
            <input type="submit" hidden>
            <div class="spinner-border text-primary" role="status" wire:loading>
                <span class="visually-hidden">Loading...</span>
            </div>
        </th>
    </form>
</tr>
