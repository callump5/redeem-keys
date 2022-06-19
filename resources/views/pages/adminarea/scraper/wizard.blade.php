@extends('layouts.adminarea.layout')

@section('content')


    {{-- Actons  --}}
    @push('actions')
        <a href='/admin/scraper/cdkeys/wizard/category' class="btn btn-md btn-warning mx-1"><i class="bi bi-plus" style="font-size: 13px"></i> Scrape Category</a>
        <a ref='/admin/scraper/cdkeys/' class="btn btn-md btn-warning mx-1"><i class="bi bi-chevron-left" style="font-size: 13px"></i> Back</a>
    @endpush


    {{-- Content --}}


    <livewire:adminarea.scraper-wizard></livewire:adminarea.scraper-wizard>
@endsection

