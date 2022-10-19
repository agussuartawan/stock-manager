<tbody>
    @foreach ($purchase_details as $detail)
        <tr>
            <td>{{ $detail->expired }}</td>
            <td>{{ $detail->cure->name }}</td>
            <td>{{ $detail->qty }}</td>
            <td class="text-end">{{ idr($detail->price) }}</td>
            <td class="text-end">{{ idr($detail->subtotal) }}</td>
            <td>
                <a href="#" wire:click.prevent="$emit('editDetail', {{ $detail->id }})"
                    class="badge rounded-pill bg-primary">edit</a>
                <a href="#" wire:click.prevent="$emit('deleteDetail', {{ $detail->id }})"
                    class="badge rounded-pill bg-danger">hapus</a>
            </td>
        </tr>
    @endforeach
    <tr>
        <td colspan="3" class="text-end">
            <h5>Total</h5>
        </td>
        <td colspan="2">
            <h5 class="text-end">Rp. {{ $grand_total }}</h5>
        </td>
    </tr>
</tbody>
