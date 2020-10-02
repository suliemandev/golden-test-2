<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profession;
use App\Models\Trend;
use App\Models\Question;
use App\Models\Quiz;


class SearchController extends Controller
{
    public function index(Request $request) {
    	$keyword = $request['keyword'];

    	$search_list = [
    		'questions' => [],
    		'trends' => [],
    		'professions' => []
    	];

			// $questions = Question::whereRaw('LOWER(title) like ?', '%'.strtolower($keyword).'%')->limit(10)->get();
    	$questions = Question::where('title', 'like', '%'.$keyword.'%')->limit(10)->get();
    	$search_list['questions'] = $questions;

			// $trends = Trend::whereRaw('LOWER(title) like ?', '%'.strtolower($keyword).'%')->limit(10)->get();
    	$trends = Trend::where('title', 'like', '%'.$keyword.'%')->limit(10)->get();
    	$search_list['trends'] = $trends;

    	// $professions = Profession::whereRaw('LOWER(title) like ?', '%'.strtolower($keyword).'%')->limit(10)->get();
    	$professions = Profession::where('title', 'like', '%'.$keyword.'%')->limit(10)->get();
    	$search_list['professions'] = $professions;

    	$search_result = $search_list;
    	return view('layouts.search_results', compact('search_result'));
		}
		
		public function search_by_modal(Request $request, $modal) {
			$keyword = $request['keyword'];

			$modal_src = '\App\Models\\' . $modal;
			$real_modal = new $modal_src;
			$var = '';

			switch($modal) {
				case 'Quiz': {
					// $real_modal = $real_modal->whereRaw('LOWER(token) like ?', '%'.strtolower($keyword).'%');
    			$real_modal = $real_modal->where('title', 'like', '%'.$keyword.'%');
					$var = 'quizzes';
					break;
				}
				case 'Profession': {
					// $real_modal = $real_modal->whereRaw('LOWER(title) like ?', '%'.strtolower($keyword).'%');
    			$real_modal = $real_modal->where('title', 'like', '%'.$keyword.'%');
					$var = 'professions';
					break;
				}
				case 'Trend': {
					if(strlen($keyword) > 1) $real_modal = $real_modal->active();
					// $real_modal = $real_modal->whereRaw('LOWER(title) like ?', '%'.strtolower($keyword).'%');
    			$real_modal = $real_modal->where('title', 'like', '%'.$keyword.'%');
					$var = 'trends';
					break;
				}
				case 'Question': {
					if(strlen($keyword) > 1) $real_modal = $real_modal->active();
					// $real_modal = $real_modal->whereRaw('LOWER(title) like ?', '%'.strtolower($keyword).'%');
    			$real_modal = $real_modal->where('title', 'like', '%'.$keyword.'%');
					$var = 'questions';
					break;
				}
				default: break;
			}

			$real_modal = $real_modal->orderby('created_at', 'desc')->paginate(25);

			if($modal == 'Quiz') { //exceptional for quizzes
				foreach ($real_modal as $quiz) {
					$quiz['trends'] = app('App\Http\Controllers\QuizController')->get_quiz_trends($quiz);
				}
			}

			$page = 'pages.'.$var.'.table';

			return view($page, [$var => $real_modal]);
			
		}
}
