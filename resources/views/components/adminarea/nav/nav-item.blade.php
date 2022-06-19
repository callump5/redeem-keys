<li class="py-2">
    <a class="bg-dark text-white no-padd" style="font-size: 19px"
       id="{{$item['id']}}" href="{{$item['url']}}">
        {{$item['title']}}
    </a>
</li>


@if($item["id"] === 'logout')
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
@endif
