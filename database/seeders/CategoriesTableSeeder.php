<?php

namespace Database\Seeders;
use Database\Seeders\Factory;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Faker\Factory as a;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = a::create();
       foreach(range(1,20) as $index){
         Category::create([
            'user_id'   => rand(1,20),
            'name'      => $faker->name,
            'slug'      => strtolower(str_replace(' ','-',$faker->name)),
            'status'    => $this->renStatus()
         ]);    
       }
    }
    private function renStatus()
    {
       $status=[
         'active'  => 'active',
         'inactive'=> 'inactive'
       ];
       return array_rand($status);
    }
}
