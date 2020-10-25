@extends('welcome')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7 mb-4">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">Professions</h3>
            
            @include('layouts.filter', ['modal' => 'Profession', 'modal_id' => 'profession_modal'])

            <div id="table-result">
                @include('pages.professions.table')
            </div>

        </div>

        <div class="col-md-5 profession-edit">
            @include('pages.professions.sidebar', ['profession' => $profession])
        </div>
    </div>
</div>

@include('pages.professions.modal')

@endsection