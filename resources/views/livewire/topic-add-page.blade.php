<div>

    @error('tempPairs')
        <p>Please make sure at least 4 pairs are submitted.</p>
    @enderror
    @error('tempPairs.*.*')
        <p>Please make sure no field is empty.</p>
    @enderror


    <p><span>Topic name : </span><input type="text" wire:model.defer="name"></p>

    <button wire:click="add">Add pair</button>

    <table border="0">
        @foreach($tempPairs as $key => $arr)
            <tr wire:key="{{ $key }}">
                <td><input type="text" wire:model.defer="tempPairs.{{ $key }}.0"></td>
                <td><input type="text" wire:model.defer="tempPairs.{{ $key }}.1"></td>
            </tr>
            <td><button wire:click="remove({{ $key }})">Delete</button></td>
        @endforeach
        <button wire:click="submit()">Submit</button>
    </table>

</div>
