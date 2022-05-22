<div class="form-group mb-5">
    <label for="inputEmail3" class="form-label">{{$label}}</label>
    <input wire:model="{{$model}}.{{$name}}" name="{{$name}}" type="number" step='any' min='0' max='10000.00' class="form-control"  placeholder="{{$placeholder}}"/>
</div>
