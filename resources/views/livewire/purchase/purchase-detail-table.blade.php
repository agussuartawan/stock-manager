<tbody>
    @foreach ($purchase_details as $detail)
        <tr>
            <td>{{ $detail->cure->name }}</td>
            <td>{{ $detail->qty }}</td>
            <td>{{ $detail->price }}</td>
            <td>{{ $detail->expired }}</td>
            <td>
                <a href="#" wire:click.prevent="$emit('editDetail', {{ $detail->id }})"
                    class="badge rounded-pill bg-primary">edit</a>
                <a href="#" wire:click.prevent="$emit('deleteDetail', {{ $detail->id }})"
                    class="badge rounded-pill bg-danger">hapus</a>
            </td>
        </tr>
    @endforeach
</tbody>
