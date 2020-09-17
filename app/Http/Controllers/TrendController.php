<?php

namespace App\Http\Controllers;

use App\Models\Trend;
use Illuminate\Http\Request;
use Validator;


class TrendController extends Controller
{
    public function index(Request $request)
    {
        $trends = Trend::with('professions')->orderby('created_at', 'desc')->paginate(25);
        $trend = Trend::orderby('created_at', 'desc')->first();
        $id = isset($request['item']) ? $request['item'] : null;
        if($id) $trend = Trend::find($id);
        return view('pages.trends.index', compact('trends', 'trend'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if($validator->fails()) {
            return [
                'status' => false,
                'message' => $validator->errors(),
            ];
        }

        $trend = Trend::create([
            'title'  => $request['title'],
            'active' => $request['active'] == 'true' ? 1 : 0,
        ]);

        return [
            'status' => true,
            'message' => 'Trend created successfully',
            'data' => $trend
        ];
    }

    public function edit($id) {
        $trend = Trend::find($id);
        return view('pages.trends.sidebar', compact('trend'));
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if($validator->fails()) {
            return [
                'status' => false,
                'message' => $validator->errors(),
            ];
        }

        $trend = Trend::find($id);

        if(!$trend) {
            return [
                'status' => false,
                'message' => 'Trend not found'
            ];
        }

        $trend->update([
            'title'  => $request['title'],
            'active' => $request['active'] == 'true' ? 1 : 0
        ]);

        $profession = null;
        if($request->has('profession-tit')) {
            $r = new Request([
                'title' => $request['profession-tit'],
                'trendID' => $trend->id
            ]);
            $profession_response = app('App\Http\Controllers\ProfessionController')->create($r);
            $profession = $profession_response['status'] ? $profession_response['data'] : null;
        }

        return [
            'status' => true,
            'message' => 'Trend updated successfully',
            'data' => $trend,
            'profession' => $profession
        ];
    }

    public function destroy($id)
    {
        $trend = Trend::find($id);

        if(!$trend) {
            return [
                'status' => false,
                'message' => 'Trend not found'
            ];
        }

        $trend->delete();

        return [
            'status' => true,
            'message' => 'deleted successfully'
        ];
    }
}
