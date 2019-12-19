<?php

use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

    	$kategori = ['ular', 'kadal', 'kura-kura', 'katak' , 'venom' , 'reptile care'];

    	foreach ($kategori as $data) {

    		DB::table('kategoris')->insert([

    			'nama_kategori' => $data

    		]);

    	}

    }
}
