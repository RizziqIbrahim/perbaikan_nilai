<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DataController extends Controller
{
    public function index()
    {
        $data = Data::orderBy("id", 'desc')->firstOrFail();
        return view("index", compact('data'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {  
        //name
        $changename = strtr($request->nama,"abcdefghijklmnopqrstuvwxyz","zyxwvutsrqponmlkjihgfedcba");


        //image
        $image_64 = $request->input("gambar");
        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];

        $replace = substr($image_64, 0, strpos($image_64, ',')+1); 


        $image = str_replace($replace, '', $image_64); 

        $image = str_replace(' ', '+', $image); 

        $imageName = Str::random(10).'.'.$extension;

        Storage::disk('public')->put($imageName, base64_decode($image));
        

        $data = new Data();
        $data->nama = $changename;
        $data->gambar = $imageName;
        $data->save();
        return redirect('/home')->with('success', 'Data added Succesfully');
    }


    public function create64()
    {
        return view('create64');
    }

    public function base64(Request $request)
    {
        if ($request->hasFile('gambar')) {
            if($request->file('gambar')->isValid()) {
                try {
                    $ext = $request->gambar->extension();  
                    //base64
                    $data = file_get_contents($request->file("gambar"));
                    $base64 = 'data:image/'.$ext.';base64,'.base64_encode($data);
                    return view("../../base64", compact("base64"));
    
    
                } catch (FileNotFoundException $e) {
                    
    
                }
            }
        }
        

        
    }
}
