<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;


    public function user()
    {
        //return $this->belongsTo('App\Models\Tag');
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function classrooms()
    {
        return $this->belongsToMany('App\Models\Classroom','classroom_chapter');
    }

    public function quizs()
    {
        return $this->belongsToMany('App\Models\Quiz','chapter_quiz');
    }

}
