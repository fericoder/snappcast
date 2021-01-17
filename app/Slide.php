<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $casts = [
        'slide_path' => 'array'
    ];
}
