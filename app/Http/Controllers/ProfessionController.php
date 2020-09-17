<?php

namespace App\Http\Controllers;

use App\Models\Profession;
use App\Models\Trend;
use Illuminate\Http\Request;
use Validator;


class ProfessionController extends Controller
{
    public function index(Request $request)
    {
        $professions = Profession::orderby('created_at', 'desc')->paginate(25);
        $profession = Profession::orderby('created_at', 'desc')->first();
        $trends = Trend::active()->get();
        $id = isset($request['item']) ? $request['item'] : null;
        if($id) $profession = Profession::find($id);
        return view('pages.professions.index', compact('professions', 'profession', 'trends'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'trendID' => 'required'
        ]);

        if($validator->fails()) {
            return [
                'status' => false,
                'message' => $validator->errors(),
            ];
        }

        $profession = Profession::create([
            'title'    => $request['title'],
            'trend_id' => $request['trendID']
        ]);

        return [
            'status' => true,
            'message' => 'Profession created successfully',
            'data' => $profession
        ];
    }

    public function edit($id) {
        $profession = Profession::find($id);
        $trends = Trend::active()->get();
        return view('pages.professions.sidebar', compact('profession', 'trends'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'trendID' => 'required'
        ]);

        if($validator->fails()) {
            return [
                'status' => false,
                'message' => $validator->errors(),
            ];
        }

        $profession = Profession::find($id);

        if(!$profession) {
            return [
                'status' => false,
                'message' => 'Profession not found'
            ];
        }

        $profession->update([
            'title'    => $request['title'],
            'trend_id' => $request['trendID']
        ]);

        return [
            'status' => true,
            'message' => 'Profession updated successfully',
            'data' => $profession
        ];
    }

    public function destroy($id)
    {
        $profession = Profession::find($id);

        if(!$profession) {
            return [
                'status' => false,
                'message' => 'Profession not found'
            ];
        }

        $profession->delete();

        return [
            'status' => true,
            'message' => 'deleted successfully'
        ];
    }
}
