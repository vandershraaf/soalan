<div>

    <div>
        <div class="mx-auto" style="width: 300px;">
            <h1 class="text-center">Edit Topic : {{ $name }}</h1>
        </div>

        <div class="container form-group">
            <label for="">Topic name</label>
            <input class="form-control" wire:model.defer="name" type="text" name="field-name" placeholder="Enter topic name">
        </div>
    </div>

    @foreach($pairs as $key => $arr)
        <div class="container">
            <div class="row" wire:key="{{ $key }}">
                <div class="col-12 col-lg-6"><div class="form-group">
                        <label class="text-left" for=""></label>
                        <textarea class="form-control" name="field-name" rows="3" placeholder="Term 1" wire:model.defer="pairs.{{ $key }}.0"></textarea>
                    </div></div>
                <div class="col-12 col-lg-6"><div class="form-group">
                        <label for=""></label>
                        <textarea class="form-control" name="field-name" rows="3" placeholder="Term 2" wire:model.defer="pairs.{{ $key }}.1"></textarea>
                    </div></div>
            </div>
        </div>
        <div class="container mx-auto" style="width: 200px;">
            <a class="btn btn-lg btn-danger" wire:click="removePair({{ $key }})">Delete Pair</a>
        </div>
    @endforeach

    <hr>

    @foreach($tempPairs as $key => $arr)
        <div class="container">
            <div class="row" wire:key="{{ $key }}">
                <div class="col-12 col-lg-6"><div class="form-group">
                        <label class="text-left" for=""></label>
                        <textarea class="form-control" name="field-name" rows="3" placeholder="New term 1" wire:model.defer="tempPairs.{{ $key }}.0"></textarea>
                    </div></div>
                <div class="col-12 col-lg-6"><div class="form-group">
                        <label for=""></label>
                        <textarea class="form-control" name="field-name" rows="3" placeholder="New term 2" wire:model.defer="tempPairs.{{ $key }}.1"></textarea>
                    </div></div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-5">
                </div>
                <div class="col-12 col-lg-2">
                    <a class="btn btn-lg btn-primary" wire:click="add">+</a>
                    <a class="btn btn-lg btn-danger" wire:click="remove({{ $key }})">-</a>
                </div>
                <div class="col-12 col-lg-5">
                </div>
            </div>
        </div>
    @endforeach


    <div class="mx-auto mt-3" style="width: 300px;">
        <a class="btn btn-lg btn-primary" wire:click="add">Add Pair</a>
        <a class="btn btn-lg btn-success" wire:click="submit()">Submit Changes</a>
    </div>

</div>
