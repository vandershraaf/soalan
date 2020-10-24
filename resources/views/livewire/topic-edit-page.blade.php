
<div>

    <p><span>Topic name : </span><input type="text" wire:model.defer="name"></p>


    <table border="0">
        @foreach($pairs as $key => $arr)
            <tr wire:key="pairs-{{ $key }}">
                <td><input type="text" wire:model.defer="pairs.{{ $key }}.0"></td>
                <td><input type="text" wire:model.defer="pairs.{{ $key }}.1"></td>
            </tr>
            <td><button wire:click="removePair({{ $key }})">Delete</button></td>
        @endforeach
    </table>

    <hr>

    <button wire:click="add">Add pair</button>

    <table border="0">
        @foreach($tempPairs as $key => $arr)
            <tr wire:key="{{ $key }}">
                <td><input type="text" wire:model.defer="tempPairs.{{ $key }}.0"></td>
                <td><input type="text" wire:model.defer="tempPairs.{{ $key }}.1"></td>
            </tr>
            <td><button wire:click="removeTemp({{ $key }})">Delete</button></td>
        @endforeach
    </table>

    <button wire:click="submit()">Submit Changes</button>

</div>
