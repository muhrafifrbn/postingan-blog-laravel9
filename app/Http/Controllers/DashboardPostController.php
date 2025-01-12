<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return \view("dashboard.posts.index", [
            "posts" =>  Post::where("user_id", Auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.posts.create", [
            "categories" => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        // return $req->file("image")->store("post-images");

        $validateData = $req->validate([
            "title" => ["required", "max:225"],
            "slug" => ["required", "unique:posts"],
            "image" => ["image", "file", "max:1024"],
            "category_id" => ["required"],
            "body" => ["required"]
        ]);
        
        if($req->file("image")){
            $validateData["image"] = $req->file("image")->store("post-images");
        }

        $validateData["user_id"] = auth()->user()->id;
        $validateData["excerpt"] = Str::of(strip_tags($validateData["body"]))->limit(200);
        Post::create($validateData);

        return \redirect("/dashboard/posts")->with("sukses","Data Postingan Berhasil Di tambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return \view("dashboard.posts.show", [
            "post" => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return \view("dashboard.posts.edit", [
            "post" => $post,
            "categories" => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // return $request->file("image");
        $validateData = [
            "title" => ["required", "max:225"],
            "category_id" => ["required"],
            "image" => ["image", "file", "max:1024"],
            "body" => ["required"]
        ];
        
        if($request->slug != $post->slug){
            $validateData["slug"] = ["required", "unique:posts"];
        } 

        $validateData = $request->validate($validateData);
        
        if($request->file("image")){
            if($post->image != null){
                Storage::delete($post->image);
            }
            $validateData["image"] = $request->file("image")->store("post-images");
        }


        $validateData["user_id"] = auth()->user()->id;
        $validateData["excerpt"] = Str::of(strip_tags($validateData["body"]))->limit(200);
        Post::where("id", $post->id)->update($validateData);

        return \redirect("/dashboard/posts")->with("sukses","Data Berhasil Di ubah");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->image){
            Storage::delete($post->image);
        }
        Post::destroy($post->id);
        return \redirect("/dashboard/posts")->with("sukses","Data Postingan Dihapus");
    }

    public function checkSlug(Request $req){
        $slug = SlugService::createSlug(Post::class, 'slug', $req->title);
        return response()->json(['slug' => $slug]);
    }
}
