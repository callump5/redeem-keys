<div class="rdk_catalog__toolbar__filter" >
    <div class="rdk_catalog__toolbar__filter__header" onclick="toggleOpen(this)">
        <p class="text-white font-alt">{{$label}}</p>
        <i class="bi bi-chevron-down"></i>
    </div>


    <div class="rdk_catalog__toolbar__filter__content">
        @foreach($items as $item)
            @if($item->children)
                <div class="rdk_catalog__toolbar__filter__header" onclick="toggleOpen(this)">
                    <x-frontend.filter.dropdown-item :params=$params :name=$name :item=$item></x-frontend.filter.dropdown-item>
                    <i class="bi bi-chevron-down"></i>
                </div>

                <div class="rdk_catalog__toolbar__filter__content">
                    @foreach($item->children as $child)
                        <x-frontend.filter.dropdown-item :params=$params :name=$name :item=$child child="true"></x-frontend.filter.dropdown-item>
                    @endforeach
                </div>
            @else
                <x-frontend.filter.dropdown-item :params=$params :name=$name :item=$item></x-frontend.filter.dropdown-item>
            @endif
        @endforeach
    </div>
</div>
