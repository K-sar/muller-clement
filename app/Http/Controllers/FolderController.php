<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Http\Requests\StoreFolder;

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

    public function store(StoreFolder $request)
    {
        $validated = $request->validated();
        $folder=Folder::create($request->all());

        return redirect('/photos')->with('status', 'Nouveau dossier ajouté');
    }
}
