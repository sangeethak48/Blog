<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class posts extends Model
{
    use SoftDeletes;

    protected $table = 'posts';

    protected $fillable = [
        'users_id',
        'categories_id',
        'title',
        'slug',
        'content',
        'image',
        'status',
        'published_at',
    ];
}