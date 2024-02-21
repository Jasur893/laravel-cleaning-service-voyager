<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $tags = Tag::all();


        $posts = Post::factory()->count(20)->create();

        foreach ($posts as $post) {
            $post->tags()->attach(rand(1, 6));
        }
    }
}
