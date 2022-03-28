<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intenship extends Model
{
    use HasFactory;

    
    public function corporate()
    {
        //return $this->belongsTo('App\Models\Tag');
        return $this->belongsTo('App\Models\Corporate','corporate_id');
    }

    public function applied_user(){
        ///return $this->belongsTo('App\Models\AppliedInternship','user_id');
    }

    public function applied_users()
    {
        return $this->belongsToMany('App\Models\User','applied_internships');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category','intenship_category');
    }

}
