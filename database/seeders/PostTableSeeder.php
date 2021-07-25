<?php

namespace Database\Seeders;
use App\Models\Post;
use Faker\Factory as a;
use Database\Seeders\Factory; 
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = a::create();
        foreach(range(1,20) as $index){
            Post::create([
                'user_id'       =>rand(1,21),
                'category_id'   =>rand(1,10),
                'title'         =>$fake->name,
                'slug'          =>strtolower(str_replace(' ','-',$fake->name)),
                'des'           =>$fake->paragraph,
                'image'         =>$fake->imageUrl(),
                'status'        =>'active'

            ]);
        }
    }
}
