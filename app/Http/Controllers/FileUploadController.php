<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class FileUploadController extends Controller
{
    public function store(Request $request){
   $request->validate([
    'image'=>'required'
   ]);

   $disk = 'local';
   $path = Storage::disk($disk)->putFile("productsImage",$request->image);


    }
    //
}
