<div class="rdk_catalog__toolbar__filter">
    <div class="rdk_catalog__toolbar__filter__header" onclick="toggleOpen(this)">
        <p class="text-white font-alt">{{$label}}</p>
        <i class="bi bi-chevron-down"></i>
    </div>

    <div class="rdk_catalog__toolbar__filter__content">
        <div class="rdk_catalog__toolbar__search">
            <i class="bi bi-search"></i>
            <input wire:model="search.name" type="text" class="form-control" placeholder="Search {{$label}}...">
        </div>
    </div>
</div>
