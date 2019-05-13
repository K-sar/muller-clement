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

        return redirect('/galerie')->with('status', 'Nouveau dossier ajouté');
    }

    public function show(Folder $folder)
    {
        return view("pictures/show_folder", ['pictures'=>$folder->pictures]);
    }

    public function edit($id)
    {
        $folder = Folder::find($id);

        return view('folders/edit', ['folder'=>$folder]);
    }

    public function destroy($id)
    {
        $folder = Folder::find($id);
        $folder->delete();

        return redirect('/galerie')->with('status', 'Le dossier a bien été supprimé');
    }

    public function update(StoreFolder $request, $id)
    {
        $validated = $request->validated();

        $folder = Folder::find($id);
        $folder->name = $request->get('name');
        $folder->slug = $request->get('slug');
        $folder->access = $request->get('access');
        $folder->save();

        return redirect('/galerie')->with('status', 'Le dossier a bien été mis à jour');
    }
}
