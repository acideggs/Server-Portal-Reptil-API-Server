<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class key extends Model
{
    protected $fillable = [
        'user', 'key'
    ];

}
