<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Http\Requests\StoreFolder;

class FolderController extends Controller
{
    public function index()
    {
        $folders = Folder::with('pictures')->get();
        return view("folders/index", compact('folders'));
    }

    public function create()
    {
        $this->authorize('admin', Folder::class);

        return view("folders/create");
    }

    public function store(StoreFolder $request)
    {
        $this->authorize('admin', Folder::class);

        $validated = $request->validated();
        $folder=Folder::create($request->all());

        return redirect(route('folder.index'))->with('status', 'Nouveau dossier ajouté');
    }

    public function show(Folder $folder)
    {
        $this->authorize('show', $folder);

        return view('folders/show', ['pictures'=>$folder->pictures, 'folder'=>$folder]);
    }

    public function edit(Folder $folder)
    {
        $this->authorize('admin', $folder);

        return view('folders/edit', ['folder'=>$folder]);
    }

    public function update(Folder $folder, StoreFolder $request)
    {
        $this->authorize('admin', $folder);

        $validated = $request->validated();

        $folder->name = $request->get('name');
        $folder->access = $request->get('access');
        $folder->save();

        return redirect(route('folder.index'))->with('status', 'Le dossier a bien été mis à jour');
    }

    public function destroy(Folder $folder)
    {
        $this->authorize('admin', $folder);
        $folder->delete();

        return redirect(route('folder.index'))->with('status', 'Le dossier a bien été supprimé');
    }

    public function slider(Folder $folder) {
        $this->authorize('admin', $folder);

        return view('folders/slider', ['pictures'=>$folder->pictures->sortBy('slider'), 'folder'=>$folder]);
    }
}
