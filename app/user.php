<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    
    protected $fillable = [

            'nama',
            'username',
            'password',
            'email'

    ];

    public function artikel(){

        return $this->hasMany('App\artikel', 'author', 'id');

    }

}
