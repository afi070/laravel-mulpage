<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'description', 
        'full_content',     // ← TAMBAHKAN INI
        'image_url',
        'image_path'
    ];
}