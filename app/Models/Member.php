<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'profession', 'company', 'expertise',
        'linkedin_profile', 'status', 'profile_picture'
    ];
       
}
