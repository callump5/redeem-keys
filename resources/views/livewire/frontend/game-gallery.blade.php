<div class="game-gallery">
    <div class="row">

        <div class="col-10 px-5">

            <div class="game-gallery__results ">
                @foreach($data as $item)
                    <div class="game-gallery__results__item" >
                        <div class="game-gallery__results__item--cover-img">
                            <img src="/storage/{{$item->img_path}}" alt=""  onmousemove="coverImgMouseMove(event)" onmouseleave="resetCoverImg(event)">
                        </div>
                        <div class="game-gallery__results__item--content">
                            <h6 class="font-alt text-white">{{$item->name}}</h6>
                            <p class="text-muted small price"><span class="currency">£</span>{{$item->price}}</p>
                        </div>
                    </div>
                @endforeach

                <div wire:loading.delay.longest  class="game-gallery__results__loading">
                    <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
                </div>
            </div>
            <div class="game-gallery__pagination">
                <select class="form-select form-select-solid form-select-sm w-70px" wire:model="perPage">
                    <option>5</option>
                    <option>10</option>
                    <option>20</option>
                    <option>40</option>
                </select>
                {{$data->links('partials.frontend.catalog.pagination')}}
            </div>
        </div>






        <div class="col-2">
            <div class="rdk_catalog__toolbar">
                <h3 class="font-alt text-white mb-4">Filters</h3>

                @dump($search)


                @if(count($search))
                <div class="rdk_catalog__toolbar__current mb-3">

                    @isset($search['name'])
                        <p><strong class="text-muted">Title: </strong><span>{{$search['name']}}</span></p>
                    @endisset

                    @isset($search["category"])
                        <p><strong class="text-muted">Category: </strong><span>{{$category->name}}</span></p>
                    @endisset

                    @isset($search["platform"])
                        <p><strong class="text-muted">Platform: </strong><span>{{$platform->name}}</span></p>
                    @endisset

                    @isset($search["collection"])
                        <p><strong class="text-muted">Collection: </strong><span>{{$collection->name}}</span></p>
                    @endisset

                    <p>
                        @isset($search["price-min"])
                            <div style="display: inline-block !important; margin-right:6px"><strong class="text-muted">Min: </strong><span>£{{$search["price-min"]}}</span></div>
                        @endisset
                        @isset($search["price-max"])
                            <div style="display: inline-block !important"><strong class="text-muted">Max: </strong><span>£{{$search["price-max"]}}</span></div>
                        @endisset
                    </p>


                    <button wire:click="resetSearch" class="rdk-btn">
                        <i class="bi bi-x"></I>
                        <span class="small">Clear Filters</span>
                    </button>
                </div>
                @endisset

                <!-- Search By Title -->
                <x-frontend.filter.search label="Title"></x-frontend.filter.search>

                <!-- Category Select -->
{{--                <x-filter.dropdown label="Categories" :params=$search name="category" :items=$categories></x-filter.dropdown>--}}

                <!-- Platform Select -->
                <x-frontend.filter.dropdown label="Platforms" :params=$search name="platform"  :items=$platforms></x-frontend.filter.dropdown>

                <!-- Platform Select -->
                <x-frontend.filter.dropdown label="Collections" :params=$search name="collection"  :items=$collections></x-frontend.filter.dropdown>

                <!-- Shop Filters -->
                <div class="rdk_catalog__toolbar__filter">
                    <div wire:ignore class="rdk_catalog__toolbar__filter__header opened mb-3" onclick="toggleOpen(this)">
                        <p class="text-white font-alt">Price</p>
                        <i class="bi bi-chevron-down"></i>
                    </div>

                    {{-- @dump($params) --}}
                    <div class="rdk_catalog__toolbar__filter__content opened rks-range-slider--toggle">
                        <div class="rdk_catalog__toolbar__current" style="margin-bottom: 0px !important;">
                            {{-- @isset($search["price-min"]) --}}
                                <div style="display: inline-block !important; margin-right:6px"><strong class="text-muted">Min: </strong><span>£{{$search["price-min"] ?? 0}}</span></div>
                            {{-- @endisset --}}
                            {{-- @isset($search["price-max"]) --}}
                                <div style="display: inline-block !important"><strong class="text-muted">Max: </strong><span>£{{$search["price-max"] ?? 100}}</span></div>
                            {{-- @endisset --}}
                        </div>

                        <div class="rdk-range-slider py-3">
                          <div wire:ignore id="slider-range"></div>
                       </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>
