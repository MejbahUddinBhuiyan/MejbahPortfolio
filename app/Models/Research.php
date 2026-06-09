<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    protected $table = 'research';

    protected $fillable = [
        'title',
        'category',
        'description',
        'status',
        'institution',
        'collaborators',
        'publication_link',
        'image',
        'is_featured',
        'sort_order',
    ];
}