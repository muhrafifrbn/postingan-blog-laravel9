<?php

namespace App\Models;


class Post
{
    private static $blog_post = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Rafif Rabbani",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam animi tenetur sit! Officiis provident error, ex praesentium hic amet, expedita vel exercitationem tenetur aliquid fugit nobis commodi sequi nesciunt iste quos aperiam minus itaque. Minus quos consequatur, ullam error quidem non nemo laborum quam voluptates totam ipsam ut iure incidunt sint ab! Dignissimos nemo veniam natus exercitationem magni reprehenderit officiis eveniet, sapiente voluptatibus commodi eos facilis voluptates recusandae mollitia, sit facere illum nihil deserunt. Optio perferendis consectetur ipsum incidunt accusamus."
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Lamasia",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam animi tenetur sit! Officiis provident error, ex praesentium hic amet, expedita vel exercitationem tenetur aliquid fugit nobis commodi sequi nesciunt iste quos aperiam minus itaque. Minus quos consequatur, ullam error quidem non nemo laborum quam voluptates totam ipsam ut iure incidunt sint ab! Dignissimos nemo veniam natus exercitationem magni reprehenderit officiis eveniet, sapiente voluptatibus commodi eos facilis voluptates recusandae mollitia, sit facere illum nihil deserunt. Optio perferendis consectetur ipsum incidunt accusamus."
        ]
        ];

    public static function all(){
        return collect(self::$blog_post);
    }

    public static function find($slug){

        $post = static::all();
        return $post->firstWhere("slug",$slug);


        // foreach(self::$blog_post as $items){
        //     if($items["slug"] === $slug){
        //         return $items;
        //     }
        // }
    }
}
