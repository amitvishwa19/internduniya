<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function client()
    {
        //return $this->belongsTo('App\Models\Tag');
        return $this->belongsTo('App\Models\client','client_id');
    }
}
