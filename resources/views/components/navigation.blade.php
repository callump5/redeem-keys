<nav class="rdk_header navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
    
    <div class="container px-5">
        <a class="navbar-brand fw-bold" href="#page-top"><img class="rdk_header__logo" src="{{ asset('images/' . $logo)}}"/></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="bi-list"></i>
        </button>
        <div class="rdk_header__nav collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                @foreach($menu as $item)
                   <x-menu-item :name="$item['name']" :icon="$item['icon']"></x-menu-item>
                @endforeach
            </ul>
        </div>
    </div>
</nav>