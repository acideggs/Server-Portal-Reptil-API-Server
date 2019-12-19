<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class komentar extends Model
{
    
    protected $fillable =   [
                        
        'id_artikel',
        'komentator',
        'isi',
        'tgl_komen'

    ];

    public function artikel(){

        return  $this->belongsTo('App\artikel', 'id_artikel');

    }
    
}
