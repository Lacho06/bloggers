<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $title = $this->faker->unique()->word();

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'summary' => $this->faker->text(250),
            'borrador' => $this->faker->boolean(0),
            'user_id' => User::all()->random()->id
        ];
    }
}
