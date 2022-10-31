<tbody>
    @foreach ($customers as $customer)
        <tr>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->address }}</td>
            <td>{{ $customer->phone }}</td>
            <td>
                <a href="#" wire:click.prevent="$emit('choose:customer', {{ $customer->id }})"><span
                        class="badge rounded-pill bg-primary">pilih</span></a>
            </td>
        </tr>
    @endforeach
</tbody>
