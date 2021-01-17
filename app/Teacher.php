<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function User($id)
    {
        return User::find($id);
    }
}
