<?php

namespace App\Http\Controllers;

use Validator;
use App\Answer;
use App\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            foreach (range(0, 11) as $value) {
                $rules['q' . $value] = 'required';
            }
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()->withInput()->withErrors($validator);
            }

            $surveyId = Answer::max('survey_id') + 1;
            $questions = Question::orderBy('id')->get();

            foreach ($questions as $question) {
                $input = $request->input('q' . $question->id);

                if (is_array($input)) {
                    foreach ($input as $value) {
                        $answer = new Answer;
                        $answer->survey_id = $surveyId;
                        $answer->question_id = $question->id;
                        $answer->option_id = $value;
                        $answer->sign = $request->input('q0');
                        $answer->save();
                    }
                } else {
                    if ($question->options->count()) {
                        $answer = new Answer;
                        $answer->survey_id = $surveyId;
                        $answer->question_id = $question->id;
                        $answer->option_id = $input;
                        $answer->sign = $request->input('q0');
                        $answer->save();
                    } else {
                        $answer = new Answer;
                        $answer->survey_id = $surveyId;
                        $answer->question_id = $question->id;
                        $answer->sugguestion = $input;
                        $answer->sign = $request->input('q0');
                        $answer->save();
                    }
                }
            }

            return redirect()->route('question.index')->withStatus('调查问卷提交成功');
        }

        return redirect()->route('question.index')->withError('调查问卷提交失败');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
