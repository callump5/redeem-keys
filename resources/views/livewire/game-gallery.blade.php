
<div class="game-gallery">


    <div class="row">

        <div class="rdk_catalog__toolbar col-2">

            <!-- Search By Title -->
            
            <x-filter.search name="Search Title"></x-filter.dropdown>

            <!-- Category Select -->

            <x-filter.dropdown name="Categories"></x-filter.dropdown>
            <!-- <div  class="rdk_catalog__toolbar__categories">
                <select class="form-select" wire:model="search.category" name="s_categories" id="">
                    <option value="">Select A Category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div> -->

            <!-- Platform Select -->
            
            <x-filter.dropdown name="Platforms"></x-filter.dropdown>
            <!-- <div  class="rdk_catalog__toolbar__platforms">
                <select class="form-select" wire:model="search.platform" name="s_platforms" id="">
                    <option value="">Select A Platform</option>
                    @foreach($platforms as $platform)
                        <option value="{{$platform->id}}">{{$platform->name}}</option>
                    @endforeach
                </select>
            </div> -->


            <!-- Shop Filters --> 


            
        </div>


        <div class="game-gallery__results col-10">
            @foreach($data as $item)
                <div class="game-gallery__results__item" >
                    <div class="game-gallery__results__item--cover-img">
                        <img src="{{asset('images/default_cover.png')}}" alt=""  onmousemove="coverImgMouseMove(event)" onmouseleave="resetCoverImg(event)">
                    </div>
                    <div class="game-gallery__results__item--content"> 
                        <h4 class="font-alt text-white">{{$item->name}}</h4>   
                        <p class="text-muted price"><span class="currency">£</span>{{$item->price}}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

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


    <script>

        function coverImgMouseMove(event){
            
            let rect = event.target.getBoundingClientRect();
            let mosXPos = event.clientX - rect.left;	
            let mosYPos = event.clientY - rect.top;	
            let itemWidth = event.target.offsetWidth;
            let itemHeight = event.target.offsetHeight;
            let mosXOffset = mosXPos - (itemWidth / 2 )
            let mosYOffset = mosYPos - (itemHeight / 2 )

            let xPosPercent = (mosXOffset / itemWidth) * 5
            let yPosPercent = (mosYOffset / itemHeight) * 5
            
            event.target.style.transform = `perspective(${itemWidth}px) rotateX(${yPosPercent}deg) rotateY(${xPosPercent}deg) scale3d(1, 1, 1)`;
          
        }


        function resetCoverImg(event){
            let itemWidth = event.target.offsetWidth;
            let target = event.target;
            
            setTimeout(function(){
                event.target.style.transform  = 'rotateX(0deg)'; 
                event.target.style.transform  = 'rotateY(0deg)';
                event.target.style.transform = `perspective(${itemWidth}px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)`;
            }, 1000);     
            
        }

    </script>


</div>