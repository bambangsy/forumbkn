<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable=[
        'content',
        'user_id',
        'thread_id',
        'is_reply_to',
        'is_first_post'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }


    public static function get_reply($id)
    {
        return Post::where('is_reply_to', $id)->orderBy('id', 'desc')->get();
    }
    

}
