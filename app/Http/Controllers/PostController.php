<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{
    public function index(Request $req){
        // return Post::all()[1];
        // \dd(\request("search"));
        $title = "";
        if(request("category")){
            $category = Category::firstWhere("slug", request("category"))->name;
            $title = " In $category";
        }
        if(request("author")){
            $author = User::firstWhere("username", request("author"))->name;
            $title = " In $author";
        }

    
        return view("posts" , [
            'title' => "All Post $title",
            // "blogs" => Post::all()
            // "posts" => Post::with(["user", "category"])->latest()->get()
            "active" => "blog",
            "posts" => Post::latest()->Filter(request(["search", "category", "author"]))->paginate(7)->withQueryString()
        ]);
    }

    public function show(Post $post){
        return view('post', [
            "title"=>"Single Post",
            "active" => "blog",
            "item" => $post
        ]);
    }
}
