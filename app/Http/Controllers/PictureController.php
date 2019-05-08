<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PictureController extends Controller
{
    public function index()
    {
        $Pictures = Picture::all();
        return view("pictures/index", ['pictures'=>$Pictures]);
    }

    public function show_folder(Folder $folder)
    {
        return view("pictures/show_folder", ['pictures'=>$folder->pictures]);
    }
}
