<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
    'degree',
    'institution',
    'department',
    'start_year',
    'end_year',
    'description',
    'sort_order',
    ];
}
