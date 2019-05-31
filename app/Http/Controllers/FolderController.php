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

        return redirect(route('folder.index'))->with('status', 'Nouveau dossier ajouté');
    }

    public function show(Folder $folder)
    {
        return view('folders/show', ['pictures'=>$folder->pictures, 'folder'=>$folder]);
    }

    public function edit(Folder $folder)
    {
        return view('folders/edit', ['folder'=>$folder]);
    }

    public function update(Folder $folder, StoreFolder $request)
    {
        $validated = $request->validated();

        $folder->name = $request->get('name');
        $folder->access = $request->get('access');
        $folder->save();

        return redirect(route('folder.index'))->with('status', 'Le dossier a bien été mis à jour');
    }

    public function destroy(Folder $folder)
    {
        $folder->delete();

        return redirect(route('folder.index'))->with('status', 'Le dossier a bien été supprimé');
    }
}
