<div wire:ignore class="form-group mb-5">
    <label for="inputEmail3" class="form-label">{{$label}}</label>
    <select id='{{$name}}--select2' wire:ignore wire:model="{{$model}}.{{$name}}"  name="{{$name}}[]" class="select2 form-control" data-toggle="select2" multiple="multiple" data-placeholder="Select an option">
        <option disabled>Select an option</option>
        @foreach($data as $group)
            <optgroup label="{{$group->name}}">
                <option
                    @foreach($selected as $item)
                        {{$item->id === $group->id ? 'selected=selected' : '' }}
                    @endforeach
                    value="{{$group->id}}">{{$group->name}} -- Main</option>
                @foreach($group->children as $child)
                    <option
                        @foreach($selected as $item)
                            {{$item->id === $child->id ? 'selected=selected' : '' }}
                        @endforeach
                        value="{{$child->id}}">{{$child->name}}</option>
                @endforeach
            </optgroup>
        @endforeach
    </select>
</div>


