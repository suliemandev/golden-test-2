<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TrendController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SpaController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebsiteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::get('/search', [SearchController::class, 'index'])->name('search');
    Route::get('/search/{modal}', [SearchController::class, 'search_by_modal'])->name('search_by_modal');

    Route::prefix('/questions')->group(function () {
        Route::get('/', [QuestionController::class, 'index'])->name('questions');
        Route::post('/create', [QuestionController::class, 'create'])->name('questions_create');
        Route::get('/{id}/edit', [QuestionController::class, 'edit'])->name('questions_edit');
        Route::post('/{id}/update', [QuestionController::class, 'update'])->name('questions_update');
        Route::post('/{id}/delete', [QuestionController::class, 'destroy'])->name('questions_delete');
    });

    Route::prefix('/trends')->group(function () {
        Route::get('/', [TrendController::class, 'index'])->name('trends');
        Route::post('/create', [TrendController::class, 'create'])->name('trends_create');
        Route::get('/{id}/edit', [TrendController::class, 'edit'])->name('trends_update');
        Route::post('/{id}/update', [TrendController::class, 'update'])->name('trends_update');
        Route::post('/{id}/delete', [TrendController::class, 'destroy'])->name('trends_delete');
    });

    Route::prefix('/professions')->group(function () {
        Route::get('', [ProfessionController::class, 'index'])->name('professions');
        Route::post('/create', [ProfessionController::class, 'create'])->name('professions_create');
        Route::get('/{id}/edit', [ProfessionController::class, 'edit'])->name('professions_update');
        Route::post('/{id}/update', [ProfessionController::class, 'update'])->name('professions_update');
        Route::post('/{id}/delete', [ProfessionController::class, 'destroy'])->name('professions_delete');
    });

    Route::prefix('/quizzes')->group(function () {
        Route::get('/', [QuizController::class, 'index'])->name('quizzes');
        // Route::post('/create', [QuizController::class, 'create'])->name('quizzes_create');
        Route::get('/{id}/edit', [QuizController::class, 'edit'])->name('quizzes_edit');
        Route::post('/{id}/delete', [QuizController::class, 'destroy'])->name('quizzes_delete');
    });

    Route::get('/logout', function() {
        \Auth::logout();
        return redirect('/login');
    });

});

Route::get('questions/json', [QuestionController::class, 'json'])->name('questions');
Route::post('quizzes/json', [QuizController::class, 'json'])->name('quizzes_index');
Route::post('quizzes/create', [QuizController::class, 'create'])->name('quizzes_create');

#temp
Route::get('quizzes/clear', function() {
    \App\Models\Quiz::truncate();
    return 1;
});
#endtemp


Auth::routes(['register' => false]);


// Route::get('/{any}', [SpaController::class, 'index'])->where('any', '.*');

Route::redirect('/', 'ar');

Route::group([
    'prefix' => '{locale}', 
    'where' => ['locale' => '[a-zA-Z]{2}'], 
    'middleware' => 'setlocale'
    ], function() {
        Route::get('/', [WebsiteController::class, 'index']);
        Route::post('client', [WebsiteController::class, 'client']);
        Route::post('quiz', [WebsiteController::class, 'quiz']);
    }
);


