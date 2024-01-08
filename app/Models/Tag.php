<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function getRandom()
    {
        if (is_null($this->posts()->inRandomOrder()->first()) ) {
            return 'empty';
        }
        return $this->posts()->inRandomOrder()->first();
    }
}
