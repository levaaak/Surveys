<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'survey_id',
        'type',
        'content',
        'required',
    ];
    protected $casts = [
        'options' => 'array',
    ];
}
