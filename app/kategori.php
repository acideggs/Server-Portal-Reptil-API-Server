<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\artikel;

class kategori extends Model
{
    //

    protected $fillable = ['nama_kategori'];
    
    public function artikel(){

            return $this->hasMany('App\artikel', 'kategori', 'id');

    }

}
