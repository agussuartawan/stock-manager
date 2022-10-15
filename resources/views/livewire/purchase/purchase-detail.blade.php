<div class="row">
    <div class="col-lg-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <table class="table table-bordered table-hovered">
            <thead>
                <tr>
                    <th>
                        <label for="" class="form-label">Cari Kode Obat</label>
                        <div class="input-group">
                            <input type="text" class="form-control col-2 @error('cure_id') is-invalid @enderror"
                                id="cureCode" wire:model="cure_code" placeholder="Kode" wire:change="setCureId(true)">
                        </div>
                    </th>
                    <th>
                        <label for="" class="form-label">Cari Nama Obat</label>
                        <div class="input-group">
                            <input type="hidden" wire:model="cure_id" id="cure_id">
                            <input type="text" class="form-control @error('cure_id') is-invalid @enderror"
                                id="cureName" wire:model="cure_name" placeholder="Nama Obat">
                            <button class="input-group-text btn btn-secondary icon icon-left"
                                id="btn-search-supplier"><i class="bi bi-search"></i></button>
                        </div>
                    </th>
                    <th>
                        <label for="" class="form-label">Jumlah</label>
                        <div class="input-group">
                            <input type="text" class="form-control @error('qty') is-invalid @enderror" id="qty"
                                wire:model="qty" placeholder="Jumlah">
                        </div>
                    </th>
                    <th>
                        <label for="" class="form-label">Harga</label>
                        <div class="input-group">
                            <input type="text" class="form-control @error('price') is-invalid @enderror"
                                id="price" wire:model="price" placeholder="Harga jual">
                        </div>
                    </th>
                    <th>
                        <label for="" class="form-label">Expired</label>
                        <div class="input-group">
                            <input type="date" class="form-control @error('expired') is-invalid @enderror"
                                id="expired" wire:model="expired">
                        </div>
                    </th>
                    <th>
                        <label for="" class="text-white form-label">Aksi</label>
                        <div class="input-group">
                            <button class="btn btn-primary" wire:click.prevent="store">Tambah</button>
                        </div>
                    </th>
                </tr>
            </thead>

            <tbody>
                <livewire:purchase.purchase-detail-table />
            </tbody>
        </table>
    </div>
</div>
