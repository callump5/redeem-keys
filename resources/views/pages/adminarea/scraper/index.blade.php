@extends('layouts.adminarea.layout')

@section('content')

    {{-- Actons  --}}
    @push('actions')
        <a href='/admin/scraper/cdkeys/wizard/product' class="btn btn-md btn-warning mx-1"><i class="bi bi-plus" style="font-size: 13px"></i> Scrape Product</a>
        <a ref='admin/scraper/cdkeys/wizard/category' class="btn btn-md btn-warning mx-1"><i class="bi bi-plus" style="font-size: 13px"></i> Scrape Category</a>
    @endpush


    {{-- Content --}}
@endsection

