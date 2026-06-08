<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $fillable = [
    'title',
    'authors',
    'journal',
    'year',
    'doi',
    'publication_url',
    'pdf_file',
    'is_featured',
];
}
