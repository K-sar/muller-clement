<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Folder;

class FolderController extends Controller
{
    public function index()
    {
        $folders = Folder::all();
        return view("folders/index", ['folders'=>$folders]);
    }

    public function create()
    {
        return view("folders/create");
    }

    public function store(Request $request)
    {
        $folder=Folder::create($request->all());
        return redirect('/photos');
    }
}
