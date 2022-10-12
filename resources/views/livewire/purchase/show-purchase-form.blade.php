<form>
    <div class="row">
        <div class="col-lg-4">
            <label for="code" class="form-label">Supplier</label>
            <div class="input-group mb-3">
                <input type="hidden" wire:model="supplier_id">
                <input type="text" class="form-control col-2 @error('name') is-invalid @enderror" id="code"
                    wire:model="code" placeholder="Kode">
                <input type="text" class="form-control @error('supplierName') is-invalid @enderror" id="supplierName"
                    wire:model="supplierName" placeholder="Nama Supplier">
                <button class="input-group-text btn btn-secondary icon icon-left" id="btn-search-supplier"><i
                        class="bi bi-search"></i></button>
                @error('supplier_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="col-lg-4">
            <div class="mb-3">
                <label for="date" class="form-label">Tanggal</label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                    wire:model="date">
                @error('date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="col-lg-4">
            <div class="mb-3">
                <label for="code" class="form-label">No. Obat Keluar</label>
                <input type="text" class="form-control" id="code" wire:model="code" disabled>
            </div>
        </div>
    </div>

    <div class="row">
        <table class="table">
            <div class="thead">
                <tr>
                    <th>No.</th>
                    <th>Obat</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Expired</th>
                </tr>
            </div>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>OBT100001 | Panadol</td>
                    <td>120</td>
                    <td>5.000</td>
                    <td>20/12/2025</td>
                </tr>
            </tbody>
        </table>
    </div>
</form>
