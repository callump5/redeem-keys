<div wire:ignore class="form-group mb-5">
    <label for="inputEmail3" class="form-label">{{$label}}</label>
    <textarea wire:model="{{$model}}.{{$name}}" id="editor" name="{{$name}}" class="rdk-ckeditor form-control" placeholder="Enter content" id="floatingTextarea" style="height: 100px;">
        {{$value}}
    </textarea>
</div>
