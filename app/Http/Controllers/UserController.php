<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\user;

class UserController extends Controller

{
    
    public function index(){

		$data_user = user::all();

            return 	response([
			
                'Status'	=>	"SUCCESS",
                'Data'		=> 	$data_user
    
            ]);

	}

	public function search(Request $request){

		if($request->has('id')){

			$data = user::find($request->id);
			
			if($data === null) {

                return response()->json([

                    'Status'	=>	"EMPTY"
        
                    ]);

            } else {

                return response()->json([

                    'Status'	=>	"SUCCESS",
                    'Data'		=>	$data
        
                    ]);

            }

		} else if($request->has('username')){

                $data = user::where('username', '=' , $request->username)->get();
                
                if(count($data) == 0) {
    
                    return response()->json([
    
                        'Status'	=>	"EMPTY"
            
                        ]);
    
                } else {
    
                    return response()->json([
    
                        'Status'	=>	"SUCCESS",
                        'Data'		=>	$data
            
                        ]);
    
                }

        } else if($request->has('email')){

            $data = user::where('email', '=' , $request->email)->get();
                
                if(count($data) == 0) {
    
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


            user::create([

                'nama'  	=>	$request->nama,
                'username'	=>	$request->username,
                'password'	=>	Crypt::encryptString($request->password),
                'email'		=>	$request->email
    
            ]);

            return response([

                'Status'	=>	"SUCCESS",
                'Message'	=>	"Data berhasil ditambahkan"
    
            ]);


	}

	public function update(request $request){

        $nama = $request->nama;
        $password = Crypt::encryptString($request->password);
        $email = $request->email;

		$user = user::find($request->id);
        
        if($user === null) {

            return response([

                'Status'	=>	"EMPTY"

            ]);

        } else {

            $user->nama = $nama;
            $user->password = $password;
            $user->email = $email;
            $user->save();

            return response([

                'Status'	=>	"SUCCESS",
                'Message'	=>	"Data berhasil diperbarui"

            ]);

        }

	}

	public function delete(request $request){

		$user = user::find($request->id);
        
        if($user === null){

            return response([

                'Status'	=>	"EMPTY"

            ]);

        } else {

            $user->delete();

            return response([

                'Status'	=>	"SUCCESS",
                'Message'	=>	"Data berhasil dihapus"

            ]);

        }

	}
    
}
