@extends('welcome')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7 mb-4">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">Quizzes</h3>

            @include('layouts.filter', ['modal' => 'Quiz', 'modal_id' => 'quiz_modal', 'disable_add' => true])

            <div id="table-result">
                @include('pages.quizzes.table')
            </div>

        </div>

        <div class="col-md-5 quiz-edit">
            @include('pages.quizzes.sidebar', ['quiz' => $quiz])
        </div>

    </div>
</div>

@endsection