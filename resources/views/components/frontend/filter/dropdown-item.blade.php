<label class="
@if(isset($child)) px-2 @endif
@if(isset($params[$name]) && $params[$name] === strval($item->id)) active @endif">
    <input type="radio" checked wire:model="search.{{$name}}" name="search.{{$name}}" value="{{$item->id}}">
    {{$item->name}}
</label>
