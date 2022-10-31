<tr>
    <form wire:submit.prevent="searchCustomer">
        <th>
            <input type="text" class="form-control" wire:model.defer="customer_name" placeholder="Cari nama customer">
        </th>

        <th>
            <input type="text" class="form-control" wire:model.defer="customer_address"
                placeholder="Cari alamat pelanggan">
        </th>

        <th>
            <input type="text" class="form-control" wire:model.defer="customer_phone"
                placeholder="Cari nomor telp pelanggan">
        </th>
        <th>
            <input type="submit" hidden>
            <div class="spinner-border text-primary" role="status" wire:loading>
                <span class="visually-hidden">Loading...</span>
            </div>
        </th>
    </form>
</tr>
