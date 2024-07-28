<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view("login.index", [
            "title" => "Login",
            "active" => "login"
        ]);
    }

    public function authenticate(Request $req){
        $data = $req->validate([
            "email" => ["required", "email:dns"],
            "password" => ["required"]
        ]);
        
        if(Auth::attempt($data)){
            $req->session()->regenerate();
            return \redirect()->intended("/dashboard");
        }

        return \redirect("/login")->with("loginError", "Login Gagal!");
    }

    public function logout(Request $req){
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return \redirect("/");
    }
}
