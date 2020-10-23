<div style="text-align: center">
    <button wire:click="increment">+</button>
    <h1>{{ $count }}</h1>

    <input name="mytext" wire:model="mytext">
    <button wire:click="add()"  >Add</button>

    @if(!$hidden)
        <h2>{{ $mytext }}</h2>
        <ul>
            @endif
            @foreach($mylist as $index => $val)
                <li>{{ $val }}</li><button wire:click="remove({{ $index }})">x</button>
            @endforeach
        </ul>

</div>



