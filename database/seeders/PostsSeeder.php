<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::factory(10)->create();
        foreach ($posts as $post){
            #Crea comentarios
            Comment::factory(1)->create([
                'user_id'=>$post->id,
            ]);
        }
        
    }
}
