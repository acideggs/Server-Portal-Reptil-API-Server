<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kategori;
use App\Transformers\KategoriTransformer;

class KategoriController extends Controller
{
    //

	public function index(){

		$data_kategori = kategori::all();

		return 	response([
			
			'Status'	=>	"SUCCESS",
			'Data'		=> 	$data_kategori

		]);

	}

	public function search(Request $request){

		if($request->has('id')){

			$data = kategori::find($request->id);
			
			if($data === null){

				return response()->json([

					'Status'	=>	"EMPTY"

				]);

			} else {

				return response()->json([

					'Status'	=>	"SUCCESS",
					'Data'		=>	$data

				]);

			}

		} else if ($request->has('nama_kategori')) {

			$data = kategori::where('nama_kategori', '=' , $request->nama_kategori)->get();

			if($data === null){

				return response()->json([

					'Status'	=>	"EMPTY"

				]);

			} else {

				return response()->json([

					'Status'	=>	"SUCCESS",
					'Data'		=>	$data

				]);

			}

		} else {

			return	$this->index();

		}

	}

	public function create(request $request){

		Kategori::create([

			'nama_kategori' => $request->nama_kategori

		]);

		return response()->json([

			'Status'	=>	"SUCCESS",
			'Message'	=>	"Data berhasil ditambahkan"
			
		]);

	}

	public function update(request $request){

		$kategori = kategori::find($request->id);

		if($kategori === null){

			return response()->json([

				'Status'	=>	"EMPTY"
				
			]);

		} else {

			$nama_kategori = $request->nama_kategori;
			$kategori->nama_kategori = $nama_kategori;
			$kategori->save();

			return response()->json([

				'Status'	=>	"SUCCESS",
				'Message'	=>	"Data berhasil diperbarui"
				
			]);

		}

	}

	public function delete(request $request){

		$kategori = kategori::find($request->id);
		
		if($kategori === null) {

			return response()->json([

				'Status'	=>	"EMPTY"
				
			]);

		} else {

			$kategori->delete();

			return response()->json([

				'Status'	=>	"SUCCESS",
				'Message'	=>	"Data berhasil dihapus"
				
			]);

		}

	}

}
