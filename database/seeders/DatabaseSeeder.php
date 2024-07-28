<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(3)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => "Rafif Rabbani",
            "username" => "rafif",
            'email' => "afif@gmail.com",
            'password' => bcrypt('12345')
        ]);

        // User::create([
        //     'name' => "Barcelona Lamasia",
        //     'email' => "lamasia@gmail.com",
        //     'password' => bcrypt('12345')
        // ]);

        Category::create([
            'name'=>'Web Programming',
            'slug'=>'web-programming'
        ]);

        Category::create([
            'name'=>'Personal',
            'slug'=>'personal'
        ]);

        Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere sapiente molestiae, quam animi, enim dolor eos ut quod harum, voluptatem impedit ad voluptate dignissimos ab sint nostrum at ea.",
        //     'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere sapiente molestiae, quam animi, enim dolor eos ut quod harum, voluptatem impedit ad voluptate dignissimos ab sint nostrum at ea. Ullam saepe voluptatum iure? Tenetur, tempora odit nostrum minus odio inventore, explicabo nam numquam sit quos non sequi possimus porro unde impedit amet itaque veniam beatae. Eius quidem temporibus laudantium numquam voluptatibus error harum voluptatum porro nulla fuga quo itaque minima labore tempora, repellendus modi dolores quibusdam quas. Soluta alias ab vero delectus cumque architecto nihil voluptas consectetur sapiente, beatae sed hic, exercitationem accusantium voluptates dolorem maiores repellendus enim reprehenderit. Vel?',
        //     'category_id' => '1',
        //     'user_id' => '1'
        // ]);
        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere sapiente molestiae, quam animi, enim dolor eos ut quod harum, voluptatem impedit ad voluptate dignissimos ab sint nostrum at ea.",
        //     'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere sapiente molestiae, quam animi, enim dolor eos ut quod harum, voluptatem impedit ad voluptate dignissimos ab sint nostrum at ea. Ullam saepe voluptatum iure? Tenetur, tempora odit nostrum minus odio inventore, explicabo nam numquam sit quos non sequi possimus porro unde impedit amet itaque veniam beatae. Eius quidem temporibus laudantium numquam voluptatibus error harum voluptatum porro nulla fuga quo itaque minima labore tempora, repellendus modi dolores quibusdam quas. Soluta alias ab vero delectus cumque architecto nihil voluptas consectetur sapiente, beatae sed hic, exercitationem accusantium voluptates dolorem maiores repellendus enim reprehenderit. Vel?',
        //     'category_id' => '1',
        //     'user_id' => '1'
        // ]);
        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere sapiente molestiae, quam animi, enim dolor eos ut quod harum, voluptatem impedit ad voluptate dignissimos ab sint nostrum at ea.",
        //     'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere sapiente molestiae, quam animi, enim dolor eos ut quod harum, voluptatem impedit ad voluptate dignissimos ab sint nostrum at ea. Ullam saepe voluptatum iure? Tenetur, tempora odit nostrum minus odio inventore, explicabo nam numquam sit quos non sequi possimus porro unde impedit amet itaque veniam beatae. Eius quidem temporibus laudantium numquam voluptatibus error harum voluptatum porro nulla fuga quo itaque minima labore tempora, repellendus modi dolores quibusdam quas. Soluta alias ab vero delectus cumque architecto nihil voluptas consectetur sapiente, beatae sed hic, exercitationem accusantium voluptates dolorem maiores repellendus enim reprehenderit. Vel?',
        //     'category_id' => '2',
        //     'user_id' => '1'
        // ]);
        // Post::create([
        //     'title' => 'Judul Keempat',
        //     'slug' => 'judul-keempat',
        //     'excerpt' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere sapiente molestiae, quam animi, enim dolor eos ut quod harum, voluptatem impedit ad voluptate dignissimos ab sint nostrum at ea.",
        //     'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere sapiente molestiae, quam animi, enim dolor eos ut quod harum, voluptatem impedit ad voluptate dignissimos ab sint nostrum at ea. Ullam saepe voluptatum iure? Tenetur, tempora odit nostrum minus odio inventore, explicabo nam numquam sit quos non sequi possimus porro unde impedit amet itaque veniam beatae. Eius quidem temporibus laudantium numquam voluptatibus error harum voluptatum porro nulla fuga quo itaque minima labore tempora, repellendus modi dolores quibusdam quas. Soluta alias ab vero delectus cumque architecto nihil voluptas consectetur sapiente, beatae sed hic, exercitationem accusantium voluptates dolorem maiores repellendus enim reprehenderit. Vel?',
        //     'category_id' => '2',
        //     'user_id' => '2'
        // ]);
    }
}
