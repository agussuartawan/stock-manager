<div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $formTitle }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="$emit('modal:close')"></button>
            </div>
            <div class="modal-body">
                @livewire($formComponent)
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary me-2" data-bs-dismiss="modal" wire:click="$emit('modal:close')">
                    <i class="bi bi-caret-left-square-fill"></i>
                    Tutup
                </button>

                <button class="btn btn-primary" wire:click="{{ $action }}">
                    <i class="bi bi-cloud-arrow-up-fill"></i>
                    Simpan
                </button>
            </div>
        </div>
    </div>
</div>
