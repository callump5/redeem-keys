@extends('layouts.adminarea.layout')

@push('header-scripts')
    <script src="{{asset("js/lib/ckeditor/ckeditor.js")}}"></script>
@endpush

@section('content')
    <livewire:adminarea.edit-block :game="$game" :platforms="$platforms" :categories="$categories" :collections="$collections"></livewire:adminarea.edit-block>
@endsection
