@extends('layouts.adminarea.layout')

@section('content')
    <div class="row h-100 justify-content-center">
        <div class="col-md-12">

            <div class="card bg-dark text-white table-max-height" >
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h4 class="header-title">Games</h4>
                        <div class="actions d-flex">
                            <!-- item-->
                            <a class="fs-6 px-3" href="javascript:void(0);"><i class="bi bi-plus"></i> Add</a>
                        </div>
                    </div>

                    <livewire:adminarea.collection-table model="App\Models\Game"></livewire:adminarea.collection-table>

                </div> <!-- end card body-->
            </div>
        </div>
    </div>
@endsection
