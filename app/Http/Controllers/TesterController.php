<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tester;
use App\Models\User;
class TesterController extends Controller
{
    public function index(){
        $data = User::all();
        return $data->where("id","2");
        // return $data->get();
    }
    public function data(){
    
        return "Hello Rafif";
    }
}
