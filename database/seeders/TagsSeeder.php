<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'for the family',
            'violence',
            'for the children',
        ];

        foreach ($tags as $tag) {
            $newTag = Tag::create([
                'name' => $tag,
            ]);

            $newTag->posts()->saveMany(Post::find(random_int(1, 150)));
        }
    }
}
