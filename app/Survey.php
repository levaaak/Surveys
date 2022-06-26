<?php

namespace App;
use App\Question;
use App\Entry;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable =[
        'title',
        'description',
        'customer_text',
        'status',
        'owner_id'
    ];
    public function questions(){
        $questions = Question::where('survey_id', $this->id)->get();
        return $questions;
    }

    public function entries(){
        $entries = Entry::where('survey_id', $this->id)->get();
        return $entries;
    }
    public function answers(){
        $answers = Answer::where('survey_id', $this->id)->get();
        return $answers;
    }
}
