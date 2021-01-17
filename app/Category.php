<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    public $fillable = ['title', 'parent_id'];
    public function posts()
    {
        return $this->hasMany(Post::class);

    }

    public function courses()
    {
        return $this->hasMany(Course::class);

    }


    public function podcasts()
    {
        return $this->hasMany(Post::class);
        
    }



    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }


}
