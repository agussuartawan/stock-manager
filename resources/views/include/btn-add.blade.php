<a @if (isset($noEmit)) href="{{ $action }}"
    @else
        wire:click="{{ $action }}" @endif
    class="btn icon icon-left btn-primary" @if (isset($title)) target="_blank" @endif>
    @if (isset($title))
        <i class="bi bi-printer-fill"></i>
        {{ $title }}
    @else
        <i class="bi bi-plus-circle-fill"></i>
        Tambah
    @endif
</a>
