<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Lacho',
            'slug' => 'lacho',
            'alias' => 'Lacho06dev',
            'email' => 'Lacho@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        Image::factory(1)->create([
            'imageable_id' => $user->id,
            'imageable_type' => User::class
        ]);

        User::factory(99)->create();
    }
}
