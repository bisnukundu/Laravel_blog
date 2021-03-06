<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            "title"=>$this->faker->title(),
            "description"=>$this->faker->text(),
            "images"=>$this->faker->title(),
            "slug"=>$this->faker->slug(),
            "categorie_id"=>5
        ];
    }
}
