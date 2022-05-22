<div class="form-group mb-5">
    <label for="inputEmail3" class="form-label">{{$label}}</label>
    <select wire:ignore wire:model="{{$model}}.{{$name}}" name="{{$name}}[]" class="select2 form-control" data-toggle="select2" multiple="multiple" data-placeholder="Select an option">
        <option disabled>Select an option</option>
        @foreach($data as $option)
            <option
                @foreach($selected as $item)
                    @if($item->id === $option->id)
                        selected='selected'
                    @endif
                @endforeach
                value="{{$option->id}}">{{$option->name}}
            </option>
        @endforeach
    </select>
</div>


