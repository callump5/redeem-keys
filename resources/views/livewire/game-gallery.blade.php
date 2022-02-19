<div>
    <table class="table">
        <tbody>
        @foreach($data as $item)
            <td>{{$item->name}}</td>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-between">
        <div class="w-300px d-flex align-items-center">
            <select class="form-select form-select-solid form-select-sm w-70px" wire:model="perPage">
                <option>5</option>
                <option>10</option>
                <option>20</option>
                <option>40</option>
            </select>
        </div>
        <div class="w-250px">
            {{$data->links()}}
        </div>
    </div>
</div>

