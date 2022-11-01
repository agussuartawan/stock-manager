<tbody>
    @forelse ($saleDetails as $detail)
        <tr>
            @if ($detail->name)
                {{-- for cure_detail table --}}
                <td>{{ $detail->name }}</td>
                <td>{{ $detail->pivot->qty }}</td>
                <td class="text-end">{{ idr($detail->pivot->price) }}</td>
                <td class="text-end">{{ idr($detail->pivot->subtotal) }}</td>
                <td>
                    <a href="#" wire:click.prevent="$emit('edit:detail', {{ $detail->pivot->id }})"
                        class="badge rounded-pill bg-primary">edit</a>
                    <a href="#" wire:click.prevent="$emit('delete:detail', {{ $detail->pivot->id }})"
                        class="badge rounded-pill bg-danger">hapus</a>
                </td>
            @else
                {{-- for temporary table --}}
                <td>{{ $detail->cure->name }}</td>
                <td>{{ $detail->qty }}</td>
                <td class="text-end">{{ idr($detail->price) }}</td>
                <td class="text-end">{{ idr($detail->subtotal) }}</td>
                <td>
                    <a href="#" wire:click.prevent="$emit('edit:temporaryDetail', {{ $detail->id }})"
                        class="badge rounded-pill bg-primary">edit</a>
                    <a href="#" wire:click.prevent="$emit('delete:temporaryDetail', {{ $detail->id }})"
                        class="badge rounded-pill bg-danger">hapus</a>
                </td>
            @endif
        </tr>
    @empty
        <tr class="text-center">
            <td colspan="5">Tidak ada data.</td>
        </tr>
    @endforelse
    <tr>
        <td colspan="2" class="text-end">
            <h5>Total</h5>
        </td>
        <td colspan="2">
            <h5 class="text-end">Rp. {{ $grandTotal }}</h5>
        </td>
    </tr>
</tbody>
