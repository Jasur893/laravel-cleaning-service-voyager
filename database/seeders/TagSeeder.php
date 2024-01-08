<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            ['name' => 'Design'],
            ['name' => 'Marketing'],
            ['name' => 'SEO'],
            ['name' => 'Consulting'],
            ['name' => 'Development'],
            ['name' => 'Reading'],
        ];

        Tag::insert($tags);
    }
}
