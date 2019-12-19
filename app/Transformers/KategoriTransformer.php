<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\kategori;

class KategoriTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(kategori $kategori)
    {
        return [
            
            'NamaKategori' =>  $kategori->nama_kategori,
            'Created'    =>  $kategori->created_at->diffForHumans(),

        ];
    }
}
