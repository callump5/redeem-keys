
<nav class="col-2 vh-100 overflow-auto bg-dark no-padd shadow-lg" style="z-index:99999" >
    <a class="d-block bg-dark px-4 py-4 fs-4" href="{{ route("admin.dashboard")  }}">
        <img class="d-block w-75 mx-auto" src="{{ asset('images/' . $logo)}}" alt="{{config('app.name')}}">
    </a>

    <!-- Authentication Links -->
        @if(Auth::check())

            @foreach($logged_in_menu as $menu)

                <ul class="no-padd no no-marg px-4 pb-3 list-unstyled">
                    <li class="text-white text-muted">{{$menu["title"]}}</li>
                    @foreach($menu['items'] as $item)
                        @if($item["type"] === "menu")
                            <x-adminarea.menu :menu=$item></x-adminarea.menu>
                        @else
                            <x-adminarea.nav-item :item=$item></x-adminarea.nav-item>
                        @endif
                    @endforeach
                </ul>
            @endforeach
        @else
            @foreach($guest_menu as $menu)
                <ul class="no-padd no no-marg px-4 pb-3 list-unstyled">
                    <li class="text-white text-muted">{{$menu["title"]}}</li>
                    @foreach($menu['items'] as $item)
                        @if($item["type"] === "menu")
                            <x-adminarea.menu :menu=$item></x-adminarea.menu>
                        @else
                            <x-adminarea.nav-item :item=$item></x-adminarea.nav-item>
                        @endif
                    @endforeach
                </ul>
            @endforeach
        @endif
    </ul>
</nav>
