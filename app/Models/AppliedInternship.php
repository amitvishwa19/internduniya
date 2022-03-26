<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppliedInternship extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'intenship_id',
    ];
}
