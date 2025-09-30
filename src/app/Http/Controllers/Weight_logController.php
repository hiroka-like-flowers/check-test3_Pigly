<?php

namespace App\Http\Controllers;

use App\Http\Requests\Weight_logRequest;
use App\Http\Requests\Weight_targetRequest;
use Illuminate\Http\Request;
use App\Models\Weight_target;
use App\Models\Weight_log;
use Illuminate\Support\Facades\Date;

class Weight_logController extends Controller
{
    public function index() {
        $items = Weight_log::paginate(8);
        $targets = Weight_target::all();
        $targetWeight = $targets->first()->target_weight ?? 0;
        $latestWeight = $items->first()->weight ?? 0;
        $csvData = Weight_log::all();

        return view('weight_logs', compact('items', 'targets', 'csvData','targetWeight', 'latestWeight'));
    }

    public function find(Request $request) {
        return view('weight_logs', ['min'=>'', 'max'=>'', 'count'=>0]);
    }

    public function search(Request $request) {
        if ($request->has('reset')) {
            return redirect('/weight_logs')->withInput();
        }
        $query = Weight_log::query();
        $query = $this->getSearchQuery($request, $query);

        $items = $query->paginate(8);
        $count = (count($items)>0) ? count($items) : 0;
        $param = ['min'=>$request->search_input, 'max'=>$request->search_input, 'items'=>$items, 'count'=>$count];
        return view('weight_logs', $param);
    }

    public function destroy(Request $request)
    {
        Weight_log::find($request->id)->delete();
        return redirect('weight_logs');
    }

    public function create(Weight_logRequest $request)
    {
        if ($request->has('back')) {
            return redirect('/weight_logs')->withInput();
        }

        $items = $request->all();
        Weight_log::create($items);
        return view('weight_logs', compact('items'));

    }

    public function update(Weight_logRequest $request)
    {
        $items = $request->only(['date', 'weight', 'exercise_time', 'calories', 'exercise_content']);
        Weight_log::find($request->id)->update($items);

        return redirect('weight_logs');
    }

    public function show($weightLogId)
    {
        $items = Weight_log::findOrFail($weightLogId);
        return view('log', compact('items'));
    }

    public function updateTarget(Weight_targetRequest $request)
    {
        $items = $request->only(['weight']);
        Weight_target::find($request->id)->update($items);

        return redirect('goal_setting');
    }

    public function showGoalForm()
    {
        $items = Weight_target::first();
        return view('goal_setting', compact('items'));
    }

    private function getSearchQuery($request, $query)
    {
        if(!empty($request->start_date) && !empty($request->end_date)) {
            $query->whereBetween('created_at',[$request->start_date, $request->end_date]);
        } elseif (!empty($request->start_date)) {
            $query->whereDate('created_at', '>=', $request->start_date);
        } elseif (!empty($request->end_date)) {
            $query->whereDate('created_at', '<=', $request->ens_date);
        }

        return $query;
    }
}
/* ブラウザに画面表示をしようcontroller編確認する */