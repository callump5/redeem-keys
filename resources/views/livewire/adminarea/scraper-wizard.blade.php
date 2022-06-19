


<div class="card bg-dark">
    <div class="card-header ">
        <h2 class="text-center my-4 fs-4">Product Scraper Wizard</h2>
    </div>
    <div class="card-tabs d-flex justify-content-evenly w-100 text-center">


        @foreach($tabs as $key => $tab)
            <a a href="#{{$key}}" class="text-light nav-item bg-accent py-4 @if($key === $activeTab) active @endif" style="width: {{$tabWidth}}%">{{$tab}}</a>
        @endforeach
        
        
    </div>

    <div class="card-body my-3 py-5 px-5">

        
        @isset($formData)
            @dump($formData)
            @dump($activeTab)
        @endisset
        {{-- https://www.cdkeys.com/pc/elden-ring-pc-steam --}}

        <x-adminarea.forms.text model='formData' label='Product Url' name="url" placeholder="https://cdkeys.co.uk/fifa20/"></x-adminarea.forms.text>

    </div>

    <div class="card-footer px-5 py-3">
        <div class="actions d-flex justify-content-between">
            <a onclick="Livewire.emit('prevTab')" href='#' class="btn btn-md btn-warning mx-1 @if($activeTab === 1) disabled @endif" @if($activeTab === 1) disabled='disabled' @endif><i class="bi bi-chevron-left" style="font-size: 13px"></i> Back</a>
            <a onclick="Livewire.emit('nextTab')" href='#' class="btn btn-md btn-warning mx-1 @if($activeTab === count($tabs)) disabled @endif" "><i class="bi bi-chevron-right" style="font-size: 13px"></i> Next</a>
        </div>
    </div>
    
    

</div>