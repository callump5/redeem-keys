
<table class="table table-hover table-centered mb-0 text-white">
    <thead>
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>

    @foreach($data as $item)
        <tr>
            <td class="va-middle">{{$item->name}}</td>
{{--            <td>£{{$item->price}}</td>--}}
            <td class="va-middle"><span class="badge bg-warning text-dark">£{{$item->price}}</span></td>
            <td>
                <div class="d-flex justify-content-around align-items-center ">
                    <a class="text-white mx-1 py-2" href="/admin/games/{{$item->id}}"><i class="bi bi-eye"></i></a>
                    <a class="text-white mx-1 py-2" href="/admin/games/{{$item->id}}/edit" ><i class="bi bi-wrench"></i></a>
                    <a class="text-white mx-1 py-2"><i class="bi bi-recycle"></i></a>
                </div>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>

{{--<div class="game-gallery__pagination">--}}
{{--    <select class="form-select form-select-solid form-select-sm w-70px" wire:model="perPage">--}}
{{--        <option>5</option>--}}
{{--        <option>10</option>--}}
{{--        <option>20</option>--}}
{{--        <option>40</option>--}}
{{--    </select>--}}
{{--    {{$data->links('partials.frontend.catalog.pagination')}}--}}
{{--</div>--}}
