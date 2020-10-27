<div>

    @error('tempPairs')
        <p>Please make sure at least 4 pairs are submitted.</p>
    @enderror
    @error('tempPairs.*.*')
        <p>Please make sure no field is empty.</p>
    @enderror


    <div>
        <div class="mx-auto" style="width: 300px;">
            <h1 class="text-center">Create Topic</h1>
        </div>

        <div class="container form-group">
            <label for="">Topic name</label>
            <input class="form-control" wire:model.defer="name" type="text" name="field-name" placeholder="Enter topic name">
        </div>
    </div>

    <div class="mx-auto" style="width: 300px;">
        <a class="btn btn-lg btn-primary" wire:click="add">Add Pair</a>
        <a class="btn btn-lg btn-success" wire:click="submit()">Submit Topic</a>
    </div>

    @foreach($tempPairs as $key => $arr)
        <div class="container">
            <div class="row" wire:key="{{ $key }}">
                <div class="col-12 col-lg-6"><div class="form-group">
                        <label class="text-left" for=""></label>
                        <textarea class="form-control" name="field-name" rows="3" placeholder="Term 1" wire:model.defer="tempPairs.{{ $key }}.0"></textarea>
                    </div></div>
                <div class="col-12 col-lg-6"><div class="form-group">
                        <label for=""></label>
                        <textarea class="form-control" name="field-name" rows="3" placeholder="Term 2" wire:model.defer="tempPairs.{{ $key }}.1"></textarea>
                    </div></div>
            </div>
        </div>
        <div class="container mx-auto" style="width: 200px;">
            <a class="btn btn-lg btn-danger" wire:click="remove({{ $key }})">Delete Pair</a>
        </div>
    @endforeach



</div>
