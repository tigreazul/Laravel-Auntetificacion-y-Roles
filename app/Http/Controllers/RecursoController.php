<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecursoController extends Controller
{
    
    public function index(Request $request){
    	// ini_set('memory_limit', '-1');
    	// print_r($_FILES);
    	// $file = $request->file('foto');
    	// dd($file);

    	$this->validate($request, [
	        'foto' => 'required|image'
	    ]);

	    $file = $request->file('foto');
	    // $nombre = $file->getClientOriginalName();
	    $extension = $file->getClientOriginalExtension();
	    $fileName = uniqid() . '.' . $extension;
	    list($width,$height) = getimagesize($file);
		
		// die();
		// if($width <= 200 and $height <= 200){
	    	Storage::disk('local')->put($fileName,  \File::get($file));
	    	$data['status'] = true;
		// }else{
		// 	$data['status'] = false;
		// }

	    $data['path'] = asset('upload/'.$fileName);
	    return $data;

    }

    public function getAvatarUrl()
	{
	    // if ($this->photo_extension)
	        return asset('images/users/'.$this->id.'.'.$this->photo_extension);

	    // return asset('images/users/default.jpg');
	}

}