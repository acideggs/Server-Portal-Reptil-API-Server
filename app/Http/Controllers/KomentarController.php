<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\komentar;

class KomentarController extends Controller
{

	public function index(){

		$data_komentar = komentar::all();

		return 	response([
			
			'Status'	=>	"SUCCESS",
			'Data'		=> 	$data_komentar

		]);

	}

	public function search(Request $request){

		if($request->has('id')){

			$data = komentar::find($request->id);
			
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

		} else if($request->has('id_artikel')){

			$data = komentar::where('id_artikel', '=' , $request->id_artikel)->get();

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

			return	$this->index();

		}

	}

	public function create(request $request){

		$timestamp = now();

		komentar::create([

			'id_artikel'	=>	$request->id_artikel,
			'komentator'	=>	$request->komentator,
			'isi'			=>	$request->isi,
			'tgl_komen'		=>	$timestamp

		]);

		return response([

			'Status'	=>	"SUCCESS",
			'Message'	=>	"Data berhasil ditambahkan"

		]);

	}

	public function update(request $request){

		$komentar = komentar::find($request->id);

		if(count($komentar) == 0) {

			return response([

				'Status'	=>	"EMPTY"

			]);

		} else {

			$isi = $request->isi;
			$komentar->isi = $isi;
			$komentar->save();

			return response([

				'Status'	=>	"SUCCESS",
				'Message'	=>	"Data berhasil diperbarui"

			]);

		}

	}

	public function delete(request $request){

		
		
		if($request->has('id_artikel')){

			$data = komentar::where('id_artikel', '=' , $request->id_artikel)->get();

			if(count($data) == 0){

				return response()->json([

					'Status'	=>	"EMPTY"

				]);

			} else {

				foreach ($data as $item) {
					
					$item->delete();

				}

				return response()->json([

					'Status'	=>	"SUCCESS",
					'Message'	=>	"Data berhasil dihapus"

				]);

			}

		} else if($request->has('id')) {

			$komentar = komentar::find($request->id);

			$komentar->delete();

			return response([

				'Status'	=>	"SUCCESS",
				'Message'	=>	"Data berhasil dihapus"

			]);

		} else {

			return response([

				'Status'	=>	"FAIl",
				'Message'	=>	"Query yang dikirim salah"

			]);

		}

	}


}