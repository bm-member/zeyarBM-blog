<?php

use Illuminate\Database\Seeder;
use App\categoryPostModel;

class catPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker\Factory::create();
        
        for ($i=0; $i < 20; $i++) { 
            $post = new categoryPostModel();
            $post->post_id = rand(1, 20);
            $post->category_id = rand(1, 5);

            $post->save();
        }
    }
}
