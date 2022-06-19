<li class="accordion-item bg-dark border-0">
    <h2 class="accordion-header bg-dark" id="flush-headingOne">
        <button class="accordion-button bg-dark text-white no-padd py-3 collapsed" style="font-size: 17px" type="button" data-bs-toggle="collapse" data-bs-target="#flush-{{$menu['id']}}" aria-expanded="false" aria-controls="flush-{{$menu['id']}}">
            {{$menu['title']}}
        </button>
    </h2>
    <div id="flush-{{$menu['id']}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlush">
        <div class="accordion-body no-padd">
            <ul class="no-padd no no-marg list-unstyled pb-1">
                @foreach($menu["items"] as $item)
                    <x-adminarea.nav.menu-item :item=$item></x-adminarea.nav.menu-item>
                @endforeach
            </ul>
        </div>
    </div>
</li>


