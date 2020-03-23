<?php

use Illuminate\Database\Seeder;
use App\Category;
class catSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        for ($i=0; $i < 5; $i++) { 
            $post = new Category();
            $post->name = $faker->text('10');
            $post->description = $faker->text('50');
            $post->user_id = rand(1,3);
            $post->save();
        }
    }
}
