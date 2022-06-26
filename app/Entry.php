<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $table='entries';
    protected $fillable=[
        'survey_id',
        'status'
    ];
    public function survey(){
        $survey = Survey::find($this->survey_id);
        return $survey;
    }
    public function answers(){
        $answers = Answer::where('entry_id', $this->id)->get();
        return $answers;
    }
}
