@foreach ($purchase_details as $detail)
    <tr>
        <td>{{ $detail->cure->code }}</td>
        <td>{{ $detail->cure->name }}</td>
        <td>{{ $detail->qty }}</td>
        <td>{{ $detail->price }}</td>
        <td>{{ $detail->expired }}</td>
        <td><a href="#" wire:click.prevent="edit({{ $detail->id }})" class="badge rounded-pill bg-primary">edit</a>
        </td>
    </tr>
@endforeach
