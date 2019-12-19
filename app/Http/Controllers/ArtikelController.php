<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\artikel;
use App\Transformers\ArtikelTransformer;

class ArtikelController extends Controller

{

	public function index(){

		$data_artikel = artikel::with(['kategori', 'komentar', 'author'])->orderBy('created_at', 'DESC')->get();


		return response()->json([

			'Status'	=>	"SUCCESS",
			'Data'		=>	$data_artikel

		]);


	}

	public function search(Request $request){

		if($request->has("id")) {

			$data = artikel::find($request->id);
			$data->load(['kategori','komentar', 'author']);

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

		} else if ($request->has("author")){

			$data = artikel::where('author', '=' , $request->author)->orderBy('created_at', 'DESC')->get();
			$data->load(['kategori','komentar', 'author']);

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

		} else if($request->has("kategori")){

			$data = artikel::where('kategori', '=' , $request->kategori)->orderBy('created_at', 'DESC')->get();
			$data->load(['kategori','komentar', 'author']);

			if(count($data) == 0){

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

			return $this->index();

		}


	}

	public function create(request $request){

		$timestamp = now();

		artikel::create([

			'judul'		=> $request->judul,
			'isi' 		=> $request->isi,
			'author' 	=> $request->author,
			'kategori' 	=> $request->kategori,
			'tgl_post' 	=> $timestamp,
			'gambar' 	=> $request->gambar

		]);

		return response()->json([

			'Status'	=>	"SUCCESS",
			'Message'	=>	"Data berhasil ditambahkan"
			
		]);

	}

	public function update(request $request){

		$artikel = artikel::find($request->id);

		if($artikel === null) {

			return response()->json([

				'Status'	=>	"EMPTY"
				
			]);

		} else if($request->has('gambar')){

			$judul = $request->judul;
			$isi = $request->isi;
			$kategori = $request->kategori;
			$gambar = $request->gambar;
			$tgl_post = now();

			$artikel->judul = $judul;
			$artikel->isi = $isi;
			$artikel->kategori = $kategori;
			$artikel->gambar = $gambar;
			$artikel->tgl_post = $tgl_post;

			$artikel->save();

			return response()->json([

				'Status'	=>	"SUCCESS",
				'Message'	=>	"Data berhasil diperbarui"
				
			]);

		} else {

			$judul = $request->judul;
			$isi = $request->isi;
			$kategori = $request->kategori;
			// $gambar = $request->gambar;
			$tgl_post = now();

			$artikel->judul = $judul;
			$artikel->isi = $isi;
			$artikel->kategori = $kategori;
			// $artikel->gambar = $gambar;
			$artikel->tgl_post = $tgl_post;

			$artikel->save();

			return response()->json([

				'Status'	=>	"SUCCESS",
				'Message'	=>	"Data berhasil diperbarui"
				
			]);

		}

	}

	public function delete(request $request){

		$artikel = artikel::find($request->id);
		
		if($artikel === null){

			return response()->json([

				'Status'	=>	"EMPTY"
				
			]);

		} else {

			$artikel->delete();

			return response()->json([

				'Status'	=>	"SUCCESS",
				'Message'	=>	"Data berhasil dihapus"
				
			]);

		}

	}

}
