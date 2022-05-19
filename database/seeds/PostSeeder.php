<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Model\Post;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            $newPost = new Post();

            $newPost->title = $faker->sentence();
            $newPost->slug = Str::slug($newPost->title);
            $newPost->author = $faker->name();

            $newPost->text = $faker->paragraphs(4, true);

            if ($faker->boolean()) {
                $newPost->img = $faker->imageUrl(640, 480, 'BlogPost', true);
            }

            $newPost->save();
        }
    }
}
