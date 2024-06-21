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
        'is_thread',
        'is_reply_to',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasOne(PostDetail::class);
    }


    public static function get_reply($id)
    {
        return Post::where('is_reply_to', $id)->orderBy('id', 'desc')->get();
    }
    

}
