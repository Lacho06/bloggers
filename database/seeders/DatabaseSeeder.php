<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Text;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');

        $this->call(UserSeeder::class);
        Tag::factory(20)->create();
        $this->call(PostSeeder::class);
    }
}
