<a @if (isset($noEmit)) href="{{ $action }}"
    @else
    wire:click="{{ $action }}" @endif
    class="btn icon icon-left btn-primary">
    <i class="bi bi-plus-circle-fill"></i>
    Tambah
</a>
