<?php

namespace Database\Seeders;
use App\Models\User;
use Faker\Factory as a;
use Database\Seeders\Factory; 
use Illuminate\Database\Seeder;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->defaultUser(); 
        $fake = a::create();
        foreach(range(1,20) as $index){
            User::create([
                'name'      =>$fake->name,
                'email'     =>$fake->unique()->email,
                'password'  =>bcrypt($fake->password),
            ]);
        }
    }
    public function defaultUser(){
        User::create([
            'name'      =>'Admin',
            'email'     =>'admin@mail.com',
            'password'  =>bcrypt('123456'),
        ]);
    }
}
