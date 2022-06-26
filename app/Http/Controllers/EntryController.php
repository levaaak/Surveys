<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Entry;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries = Entry::orderBy('created_at', 'desc')->paginate(10);
        return view('entries.index', ['entries'=>$entries]);
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
       if(Entry::find($id)){
           $entry = Entry::find($id);
           return view('entries.show', ['entry'=>$entry]);
       } else{
           return redirect(url()->previous())->with('error', 'This entry doesn\t exist anymore.');
       }
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
        $entry = Entry::find($id);
       if($entry->status != 'closed'){
           $entry->status = 'closed';
           $entry->save();
           return redirect('/entries');
       } else{
           return redirect('/entries')->with('error', 'This entry is already closed.');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $entry = Entry::find($id);
        foreach ($answers = Answer::where('entry_id',$entry->id)->get() as $answer){

            $answer->delete();
        }
        $entry->delete();
            return redirect('/entries');


    }
}
