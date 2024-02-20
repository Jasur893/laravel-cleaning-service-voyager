<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Comment extends Model
{
    use HasFactory, Translatable;

    protected $fillable = [
        'body',
        'post_id',
        'user_id',
    ];

    /**
     *
     * Function  post
     */
    public function post(){
        return $this->belongsTo(Post::class);
    }

    /**
     *
     * Function  user
     */
    public function user(){
       return $this->belongsTo(User::class);
    }
}
