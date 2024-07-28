<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
    public function index(){
        return view("registrasi.index", [
            "active" => "register",
            "title" => "Registrasi"
        ]);
    }

    public function store(Request $req){
        $dataUser =  $req->validate([
            "name" => ["required", "max:225"],
            "username" => ["required", "min:5", "unique:users"],
            "email" => ["required", "email:dns", "unique:users"],
            "password" => ["required", "min:5", "max:225"]
        ]);

        // $dataUser["password"] = \bcrypt($dataUser["password"]);
        $dataUser["password"] = Hash::make($dataUser["password"]);

        User::create($dataUser);

        $req->session()->flash("sukses", "Registrasi Berhasil");

        return \redirect("/login")->with("sukses", "Registrasi Berhasil");
    }
}
