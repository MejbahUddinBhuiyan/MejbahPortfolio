<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
    'name',
    'title',
    'bio',
    'email',
    'phone',
    'location',
    'profile_image',
    'cv_file',
    'is_available',
     ];
}
