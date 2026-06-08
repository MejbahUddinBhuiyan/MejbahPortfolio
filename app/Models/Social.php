<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = [
    'platform',
    'url',
    'icon',
    'sort_order',
    'is_active',
];
}
