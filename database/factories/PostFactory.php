<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Topic;
use App\Models\User;
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
            'title'=>$this->faker->sentence(3),
            'lead'=>$this->faker->text(200),
            'content'=> $this->faker->paragraphs(10, true),
            'author_id'=> function(){
                return User::factory()->create();
            },
            'topic_id'=> function(){
                return Topic::factory()->create();
            },
        ];
    }
}
