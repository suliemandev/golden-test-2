@extends('welcome')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7 mb-4">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">Trends</h3>

            @include('layouts.filter', ['modal' => 'Trend', 'modal_id' => 'trend_modal'])

            <div id="table-result">
                @include('pages.trends.table')
            </div>

        </div>

        <div class="col-md-5 trend-edit">
            @include('pages.trends.sidebar', ['trend' => $trend])
        </div>
    </div>
</div>

@include('pages.trends.modal')

@endsection