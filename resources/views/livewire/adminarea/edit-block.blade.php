
<div class="card bg-dark text-white rdk-overflow">
    <div class="card-body p-5">
{{--        <form action="{{route('games.update', $game)}}" method="POST">--}}
        <form wire:submit.prevent="submit">
{{--            @dump($formData)--}}



            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="row">
                <div class="col-3 p-3">
                    <img width="100%" src="/storage/{{$game->img_path}}" class="sticky-top" style="top:25px;" alt="">
                </div>


                <div class="col-9 p-3">

                    <h1 class="mb-3">{{$game->name}}</h1>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                <p class="no-marg">{{ $error }}</p>
                            </div>
                        @endforeach
                    @endif

                    @if (session()->has('error'))
                        <div class="alert alert-warning">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
{{--                    <div wire:loading>--}}
{{--                        Loading anim...--}}
{{--                    </div>--}}

                    <x-adminarea.forms.text model='formData' label='Product Name' name="name" value="{{$game->name}}" placeholder="Enter product name"></x-adminarea.forms.text>

                    <x-adminarea.forms.price model='formData' label="CD Keys Price" name="cdkeys_price" :value="$game->cdkeys_price" placeholder="Enter price"></x-adminarea.forms.price>
                    <x-adminarea.forms.price model='formData' label="G2A Price" name="g2a_price" :value="$game->g2a_price" placeholder="Enter price"></x-adminarea.forms.price>

                    <x-adminarea.forms.textarea model='formData' label="Description" name="description" :value="$game->description"></x-adminarea.forms.textarea>

                    <x-adminarea.forms.grouped-select2 model='formData' label="Platforms" name='platforms' :data="$platforms" :selected="$game->platforms"></x-adminarea.forms.grouped-select2>
                    <x-adminarea.forms.select2 model='formData' label="Collection"  name="collections" :data="$collections" :selected="$game->collections"></x-adminarea.forms.select2>
                    <x-adminarea.forms.select2 model='formData' label="Categories" name="categories" :data="$categories" :selected="$game->categories"></x-adminarea.forms.select2>

                    <x-adminarea.forms.text model='formData' label="CD Keys Link" name="cdkeys_link" :value="$game->cdkeys_link" placeholder="Enter url"></x-adminarea.forms.text>
                    <x-adminarea.forms.text model='formData' label="G2A Link" name="g2a_link" :value="$game->g2a_link" placeholder="Enter url"></x-adminarea.forms.text>

                    <input type="hidden" wire:model="formData.id" value="{{ $game->id }}">

                   @push('actions')
                        <button type="button" class="btn btn-md btn-warning mx-1"><i class="bi bi-trash" style="font-size: 13px"></i> Remove</button>

                        <div class="dropdown">
                            <button  class="btn btn-warning dropdown-toggle mx-1" type="button" id="dropdownMenuDark" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-arrow-repeat" style="font-size: 13px"></i> Scrape
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuDark">
                                <li><a onclick="Livewire.emit('scrapeCdKeys')" class="dropdown-item" href="#">CD Keys</a></li>
                                <li><a onclick="Livewire.emit('scrapeCdKeys')" class="dropdown-item" href="#">G2A</a></li>
                            </ul>
                        </div>
                        <a onclick="Livewire.emit('submit')" class="btn btn-md btn-warning mx-1"><i class="bi bi-save" style="font-size: 13px"></i> Save</a>
                    @endpush



                </div>
            </div>
        </form>

    </div>


        <script>
            const rksCkeditor = ClassicEditor
            .create( document.querySelector( '.rdk-ckeditor' ), {
                licenseKey: '',
            } )
            .then( editor => {
                window.editor = editor;

                editor.model.document.on('change:data', () => {
                    console.log(editor.getData());
                    @this.set('formData.description', editor.getData());
                })
            } )

            .catch( error => {
                console.error( 'Oops, something went wrong!' );
                console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
                console.warn( 'Build id: ic517l694ok8-qyh8t72ssh4f' );
                console.error( error );
            } );


            $('.select2').select2({
                placeholder: '',
                allowClear: true,
                class: 'bg-dark'
            });

            $('.select2').on('change', function (e) {
                console.log('123');
                var data = $(this).val();
                console.log(data);
                @this.set('formData.platforms', data);
            });


        </script>
</div>

