<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TesterController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { // Kalau ada rute yang metode requesnya get maka jalankan ini
    // return view('welcome');
    return view("home", ['title' => "Home", "active"=>"home"]);
});

// TESTER
Route::get("/tester", [TesterController::class, "index"]);


Route::get("/about", function(){
    return view("about", [
        'title' => "About",
        "active" => "about",
        "nama" => "Rafif Rabbani",
        "email" => "afifrabbani04@gmail.com",
        "image" => "gambar.jpg"
    ]);
});

Route::get("/posts", [PostController::class, "index"]);

Route::get("post/{post:slug}", [PostController::class, "show"]);

Route::get('/categories/{category:slug}', function (Category $category) {
    // return $category->name;
    return view('posts',[
        'title' => "Category By ". $category->name,
        // 'posts' => $category->posts->load("user", "category"),
        "active" => "blog",
        'posts' => $category->posts,
    ]);
    
});

Route::get('/categories', function (Category $category ) {
    
    return view('categories',[
        'title' => "Categories",
        "active" => "categories",
        'body' => Category::all(),
    ]);
});


Route::get("authors/{user:username}", function(User $user){
    return view("posts", [
        "title" => "User By ".$user->name,
    //    "posts" => $user->posts->load("category", "user")
    "active" => "blog",
       "posts" => $user->posts
    ]);
});

// LOGIN AND REGISTRATION
Route::get("/login", [LoginController::class, "index"])->middleware("guest")->name("login");
Route::post("/login", [LoginController::class, "authenticate"]);
Route::post("/logout", [LoginController::class, "logout"]);

Route::get("/register", [RegisterController::class, "index"])->middleware("guest");
Route::post("/register", [RegisterController::class, "store"]);

// Route::get("/dashboard", [DashboardController::class, "index"])->middleware("auth");
Route::get("/dashboard", function(){
    return view("dashboard.index");
})->middleware("auth");

Route::get("/dashboard/posts/checkSlug", [DashboardPostController::class, "checkSlug"])->middleware("auth");

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware("auth");