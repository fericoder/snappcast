<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function podcasts()
    {
        return $this->hasMany(Post::class);
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function isAdmin()
    {
        return $this->type == 'admin' ? true : false;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }


    public function hasRole($role)
    {
        if (is_string($role)){
            return $this->roles->contain('name', $role);
        }
        return !! $role->intersect($this->roles)->count();
    }


    public function assignRole(Role $role)
    {
        return $this->roles()->save($role);
    }



    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */



    protected $fillable = [
        'name', 'email', 'password', 'phoneNumber', 'fullName', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'role_id' => 'array'
    ];


}
