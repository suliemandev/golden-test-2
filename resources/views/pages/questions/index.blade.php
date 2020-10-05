@extends('welcome')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-7 mb-4">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">Questions</h3>

            @include('layouts.filter', ['modal' => 'Question', 'modal_id' => 'question_modal'])

            <div id="table-result">
                @include('pages.questions.table')
            </div>

        </div>

        <div class="col-md-5 question-edit">
            @include('pages.questions.sidebar', ['question' => $question, 'trends' => $trends])
        </div>
    </div>
</div>

@include('pages.questions.modal')

@endsection