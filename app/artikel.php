<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\kategori;

class artikel extends Model
{
    protected $fillable = [
        'judul',
        'isi',
        'author',
        'kategori',
        'tgl_post',
        'gambar'
    ];

    public function kategori(){
        
        return $this->belongsTo('App\kategori', 'kategori');

    }

    public function komentar(){

        return  $this->hasMany('App\komentar', 'id_artikel');

    }

    public function author(){
        
        return $this->belongsTo('App\user', 'author');

    }

}
