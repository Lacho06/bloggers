<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\OrderPost;
use App\Models\Post;
use App\Models\Text;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::factory(10)->create();

        foreach($posts as $post){
            $images = Image::factory(1)->create([
                'imageable_id' => $post->id,
                'imageable_type' => Post::class
            ]);

            foreach($images as $image){
                OrderPost::factory(1)->create([
                    'post_id' => $post->id,
                    'itemable_id' => $image->id,
                    'itemable_type' => Image::class
                ]);
            }

            $texts = Text::factory(5)->create();

            $post->tags()->attach([
                rand(1, 4),
                rand(5, 8)
            ]);

            foreach($texts as $text){
                OrderPost::factory(1)->create([
                    'post_id' => $post->id,
                    'itemable_id' => $text->id,
                    'itemable_type' => Text::class
                ]);
            }

        }
    }
}
