<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tester extends Model
{
    use HasFactory;
    public function scopeTampil($query){
        $query->where("id",">", 2);
    }
}
