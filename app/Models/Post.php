<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    use HasFactory;


    protected $fillable = [
        'title', 'content', 'slug', 'image', 'published_at', 'user_id'
    ];
   

   


    /**
     * Отримати користувача, який створив цей пост.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
