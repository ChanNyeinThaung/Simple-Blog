<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
    	$category=new App\Category();
        $category->name='General';
        $category->save();

        $category=new App\Category();
        $category->name='Technology';
        $category->save();


        for($i=0;$i<10;$i++){
        	$post=new App\Post();
        	$post->title=$faker->sentence();
        	$post->body=$faker->paragraph();
        	$post->category_id=rand(1,2);
        	$post->save();
        }

        for($i=0;$i<10;$i++){
        	$comment=new App\Comment();
        	$comment->comment=$faker->paragraph();
        	$comment->post_id=rand(1,2);
        	$comment->save();
        }
    }

   

    // $this->call(UsersTableSeeder::class);
}
