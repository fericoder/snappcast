<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use Sluggable;
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $casts = [
        'images' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }


    public function incomes()
    {
        return $this->hasMany(Income::class);
    }


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function scopeSearch($query, $keyword)
    {
        $query->where('title', 'LIKE', '%'.$keyword.'%');
        return $query;
    }


}
