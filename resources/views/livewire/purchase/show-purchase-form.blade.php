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

    <hr>

    <div class="row">
        <div class="col-lg-12">
            @if ($errorDetail)
                <div class="alert alert-danger">Mohon isi semua kolom dengan benar!</div>
            @endif
            <table class="table table-bordered table-hovered">
                <thead>
                    <tr>
                        <th>
                            <label for="" class="form-label">Cari Kode Obat</label>
                            <div class="input-group">
                                <input type="text" class="form-control col-2" id="cureCode"
                                    wire:model="requestDetail.cureCode" placeholder="Kode">
                            </div>
                        </th>
                        <th>
                            <label for="" class="form-label">Cari Nama Obat</label>
                            <div class="input-group">
                                <input type="hidden" wire:model="requestDetail.cureId">
                                <input type="text" class="form-control" id="cureName"
                                    wire:model="requestDetail.cureName" placeholder="Nama Obat">
                                <button class="input-group-text btn btn-secondary icon icon-left"
                                    id="btn-search-supplier"><i class="bi bi-search"></i></button>
                            </div>
                        </th>
                        <th>
                            <label for="" class="form-label">Jumlah</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="qty" wire:model="requestDetail.qty"
                                    placeholder="Jumlah">
                            </div>
                        </th>
                        <th>
                            <label for="" class="form-label">Harga</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="price"
                                    wire:model="requestDetail.price" placeholder="Harga jual">
                            </div>
                        </th>
                        <th>
                            <label for="" class="form-label">Expired</label>
                            <div class="input-group">
                                <input type="date" class="form-control" id="expired"
                                    wire:model="requestDetail.expired">
                            </div>
                        </th>
                        <th>
                            <label for="" class="text-white form-label">Aksi</label>
                            <div class="input-group">
                                <button class="btn btn-primary" wire:click.prevent="addDetail">Tambah</button>
                            </div>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($purchaseDetail as $detail)
                        <tr>
                            <td>{{ $detail['cureCode'] }}</td>
                            <td>{{ $detail['cureName'] }}</td>
                            <td>{{ $detail['qty'] }}</td>
                            <td>{{ $detail['price'] }}</td>
                            <td>{{ $detail['expired'] }}</td>
                            <td><a href="#" class="badge rounded-pill bg-primary">edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</form>
