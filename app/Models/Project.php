<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
    'title',
    'slug',
    'description',
    'category',
    'tech_stack',
    'github_url',
    'live_url',
    'image',
    'is_featured',
    'is_github_synced',
];
}
