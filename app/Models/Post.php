<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'content',
        'user_id',
        'thread_id',
        'is_reply_to',
        'is_first_post'
    ];
}
