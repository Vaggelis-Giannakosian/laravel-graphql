<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $topics = collect([
            Topic::factory()->create(['name'=>'Featured Sites','slug'=>'featured',]),
            Topic::factory()->create(['name'=>'Useful Links','slug'=>'links',]),
            Topic::factory()->create(['name'=>'Guides & Tutorials','slug'=>'tutorials',])
        ]);

        $users = User::factory(12)->create();

        $users->each(function ($user) use($topics) {

            $topics->each(function($topic) use ($user){
                Post::factory()->count(2)->create([
                    'author_id'=>$user->id,
                    'topic_id'=>$topic->id,
                ]);
            });

        });
    }
}
