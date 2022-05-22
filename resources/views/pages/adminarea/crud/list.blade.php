@extends('layouts.adminarea.layout')

@section('content')
    <div class="row h-100 justify-content-center">
        <div class="col-md-12">

            <div class="card bg-dark text-white table-max-height" >
                <div class="card-body">

                    @push('actions')
                        <a class="btn btn-warning mx-1" href="javascript:void(0);"><i class="bi bi-plus"></i> Add</a>
                    @endpush

                    <livewire:adminarea.collection-table model="{{$model}}"></livewire:adminarea.collection-table>

                </div> <!-- end card body-->
            </div>
        </div>
    </div>
@endsection
