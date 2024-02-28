<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory(150)->create([
            'author_id' => rand(1, 15),
        ])->each(function (Post $post) {
            if (rand(0, 1) === 1) {
                $post->categories()->attach(
                    Category::find(rand(1, 3))->pluck('id')->toArray()
                );
            }

            if (rand(0, 1) === 1) {
                $post->tags()->attach(
                    Tag::find(rand(1, 3))->pluck('id')->toArray()
                );
            }
        });
    }
}
