<?php

namespace App\Http\Controllers;

use App\Question;
use App\Survey;
use App\User;
use Illuminate\Http\Request;
use Auth;
class SurveyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['fill', 'thankYou']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('surveys.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('surveys.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required|min:10',
            'customer_text'=>'max:500'
        ]);
        $survey =  new Survey([
            'title'=>$request->title,
            'description'=>$request->description,
            'customer_text'=>$request->customer_text,
            'status'=>1,
            'owner_id'=>Auth::user()->id,
        ]);
        $survey->save();
        return redirect('/home')->with('success', 'Survey Has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $survey = Survey::find($id);
        return view('surveys.show', ['survey'=>$survey]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $survey = Survey::find($id);
        return view('surveys.edit', ['survey'=>$survey]);
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
        $request->validate([
            'title'=>'required',
            'description'=>'required|min:10',
            'customer_text'=>'max:500'
        ]);
        $survey = Survey::find($id);
        $survey->title = $request->get('title');
        $survey->description = $request->get('description');
        $survey->customer_text = $request->get('customer_text');
        $survey->status = 1;
        $survey->owner_id = Auth::user()->id;
        $survey->save();

        return redirect('/surveys/show/'.$survey->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $survey = Survey::find($id);
        foreach ($survey->questions() as $question){
            $question->delete();
        }
        foreach ($survey->answers() as $answer){
            $answer->delete();
        }
        foreach ($survey->entries() as $entry){
            $entry->delete();
        }

        $survey->delete();
        return redirect('/surveys');
    }

    public function fill ($survey_id, Request $request){
        if($request->filled('agent_id')){
            if(User::find($request->get('agent_id'))){
                $agent = User::find($request->get('agent_id'));
                $survey = Survey::find($survey_id);
                $questions = Question::where('survey_id',$survey_id)->get();
                return view('surveys.fill', ['questions'=>$questions, 'survey'=>$survey, 'agent'=>$agent]);
            } else{
                $agent = null;
                $survey = Survey::find($survey_id);
                $questions = Question::where('survey_id',$survey_id)->get();
                return view('surveys.fill', ['questions'=>$questions, 'survey'=>$survey, 'agent'=>$agent]);
            }

        } else{
            $survey = Survey::find($survey_id);
            $questions = Question::where('survey_id',$survey_id)->get();
            return view('surveys.fill', ['questions'=>$questions, 'survey'=>$survey]);
        }

    }
    public function thankYou(){
        return view('surveys.thankYou');
    }
}
