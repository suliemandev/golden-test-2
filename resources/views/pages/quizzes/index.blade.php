@extends('welcome')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7 mb-4">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">Quizzes</h3>

            @include('layouts.filter', ['modal' => 'Quiz', 'modal_id' => 'quiz_modal', 'disable_add' => true])

            <form action="#" style="display: flex; flex-wrap: wrap; gap: 10px; align-items: flex-end;" onsubmit="filter_quizzes(event)" class="quiz-filter-form">
                <div class="form-group">
                    <label for="date_from" style="display:flex; justify-content: space-between;">From <a href="#!" onclick="clearDate('dateFrom')">x</a></label>
                    <input type="date" name="dateFrom" class="form-control">
                </div>
                <div class="form-group">
                    <label for="date_to" style="display:flex; justify-content: space-between;">To <a href="#!" onclick="clearDate('dateTo')">x</a></label>
                    <input type="date" name="dateTo" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-secondary" onclick="exportClients()">Export</button>
                </div>
            </form>

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