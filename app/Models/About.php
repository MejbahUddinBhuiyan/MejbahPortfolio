<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'heading',
        'description',
        'resume',
        'experience',
        'projects_completed',
        'research_interest',
        'photo',
    ];
}