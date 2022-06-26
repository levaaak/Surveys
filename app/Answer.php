<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable=[
        'entry_id',
        'survey_id',
        'question_id',
        'value'
    ];
    public function question(){
        $question = Question::find($this->question_id);
        return $question;
    }
}
