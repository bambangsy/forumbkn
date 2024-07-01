<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostDetail extends Model
{
    use HasFactory;

// Start Generation Here
    protected $fillable = [
        'title',
        'type',
        'tags',
        'category_id',
        'post_id',
        'expert_id'
    ];



    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
