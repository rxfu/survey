<?php

namespace App\Http\Controllers;

use DB;
use App\Question;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $teachers = DB::table('answers')
        ->select('option_id', DB::raw('COUNT(*) AS total'))
        ->where('sign', '=', 0)
        ->groupBy('option_id')
        ->orderBy('option_id', 'asc')
        ->get()
        ->keyBy('option_id');
    
        $students = DB::table('answers')
        ->select('option_id', DB::raw('COUNT(*) AS total'))
        ->where('sign', '=', 1)
        ->groupBy('option_id')
        ->orderBy('option_id', 'asc')
        ->get()
        ->keyBy('option_id');

        $items = [];
        $questions = Question::all();
        foreach ($questions as $question) {
            foreach ($question->options as $option) {
                $item['qid'] = $question->id;
                $item['qtitle'] = $question->content;
                $item['oid'] = $option->id;
                $item['otitle'] = $option->content;

                $ttotal = isset($teachers[$option->id]) ? $teachers[$option->id]->total : 0;
                $stotal = isset($students[$option->id]) ? $students[$option->id]->total : 0;
                $item['ttotal'] = $ttotal;
                $item['tpercent'] = ($ttotal + $stotal) ? $ttotal / ($ttotal + $stotal) : 0;
                $item['stotal'] = $stotal;
                $item['spercent'] = ($ttotal + $stotal) ? $stotal / ($ttotal + $stotal) : 0;

                $items[] = $item;
            }
        }

        return view('home', compact('items'));
    }
}
