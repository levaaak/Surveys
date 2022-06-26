<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Entry;
use App\Mail\SurveyNewEntry;
use App\Survey;
use Illuminate\Http\Request;
use App\Jobs\SendNewEntryEmail;
use Auth;
use Mail;
class AnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('fill');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('answers.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $answer = Answer::find($id);
        $answer->delete();
    }
    public function fill(Request $request){
        $entry = new Entry([
            'survey_id'=>$request->get('survey_id')
        ]);
        $entry->save();
        $survey = Survey::where('id',$request->get('survey_id'))->first();
        SendNewEntryEmail::dispatch($survey);

        foreach ($request->questions as $key=>$question) {
            $answer = new Answer([
                'entry_id' => $entry->id,
                'survey_id' =>$request->get('survey_id'),
                'question_id' => $question,
                'value' => $request->answer[$key]
            ]);
            $answer->save();
        }



        return redirect('/thankYou');
    }
}
