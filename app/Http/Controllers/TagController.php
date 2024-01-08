<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class TagController extends Controller
{
    public function show($tag)
    {
        if (is_null(Tag::find($tag)->posts()->first())) {
            return  redirect()->back();
        } else {
            return view('posts.show')->with([
                'post' => $post = Tag::find($tag)->posts()->inRandomOrder()->first(),
                'recent_posts' => Post::latest()->get()->except($post->id)->take(5),
                'categories' => Category::all(),
                'tags' => Tag::all(),
            ]);
        }
    }
}
