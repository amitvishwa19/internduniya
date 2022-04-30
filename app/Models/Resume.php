<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','firstname','lastname','email','mobile','website','city','state','post_code','address','resume_url'
    ];

    public function user()
    {
        //return $this->belongsTo('App\Models\Tag');
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function education()
    {
        return $this->hasMany('App\Models\Education');
    }

    public function experience()
    {
        return $this->hasMany('App\Models\Experience');
    }

    public function skills()
    {
        return $this->hasMany('App\Models\Skill');
    }

    public function achivement()
    {
        return $this->hasMany('App\Models\Achivement');
    }


}
