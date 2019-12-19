<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class ArtikelTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(artikel $artikel)
    {
        return [
            
            'Judul'     =>  $artikel->judul,
            'Isi'       =>  $artikel->isi,
            'Author'    =>  $artikel->author,
            'Kategori'  =>  $artikel->kategori,
            'TglPost'   =>  $artikel->tgl_post,
            'Gambar'    =>  $artikel->gambar,
            'Created'   =>  $artikel->created_at->diffForHumans(),

        ];
    }
}
