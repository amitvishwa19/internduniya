<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Lab404\Impersonate\Models\Impersonate;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Impersonate;
    use LogsActivity;

    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'firstName',
        'lastName',
        'username',
        'email',
        'password',
        'status',
        'verification_code',
        'google_id',
        'avatar_url',
        'role',
        'resume_id',
        'corporate_id',
        'subscribed',
        'subscription_date',
        'renew_date',
        'plan',
        'action_count',
        'payment',
        'amount'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }


    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    function teachers()
    {
        return $this->hasMany('User', 'group_message_id');
    }

    public function classrooms()
    {
        return $this->hasMany(Classroom::class);

    }

    public function corporate()
    {
        //return $this->belongsTo('App\Models\Tag');
        return $this->belongsTo('App\Models\Corporate','corporate_id');
    }

    public function resume()
    {
        //return $this->belongsTo('App\Models\Tag');
        return $this->belongsTo('App\Models\Resume','resume_id');
    }

    public function favourite_internships()
    {
        return $this->belongsToMany('App\Models\Intenship','favourite_internships');
    }

    public function applied_internships()
    {
        return $this->belongsToMany('App\Models\Intenship','applied_internships');
    }


    public function applied_internship()
    {
        return $this->belongsToMany('App\Models\Intenship','applied_internships',2);

    }


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name', 'text']);
        // Chain fluent methods for configuration options
    }

}
