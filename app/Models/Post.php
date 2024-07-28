<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Post extends Model
{
    use HasFactory;
    use Sluggable;
    // protected $fillable = ['title','excerpt','body'];
    protected $guarded = ['id'];

    protected $with = ["user", "category"];

    public function scopeFilter($query, array $filters){
        // if(isset($filters["search"]) ? $filters['search'] : false){
        //    return  $query->where("title", "LIKE", "%". $filters['search']."%")
        //     ->orWhere("body", "LIKE", "%". $filters['search']."%");
        // }

        // $query->when($filters["search"] ?? false, function($query, $value) {
        //     return  $query->where("title", "LIKE", "%". $value."%")
        //     ->orWhere("body", "LIKE", "%". $value."%");
        // });

        $query->when($filters['search'] ?? false, function($query, $search) {
        return $query->where(function($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                            ->orWhere('body', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters["category"] ?? false, function($query, $value){
            return $query->whereHas("category", function($query) use ($value){
                $query->where("slug", $value);
            });
        });

        $query->when($filters["author"] ?? false, fn($data, $value) => 
                $data->whereHas("user", fn($data) =>
                $data->where("username", $value)
            )
            );
    }


    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
