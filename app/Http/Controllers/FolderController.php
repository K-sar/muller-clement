<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Http\Requests\StoreFolder;
use App\Http\Requests\StoreOrdreFolders;
use App\Tag;

class FolderController extends Controller
{
    public function index()
    {
        $folders = Folder::with('pictures')->get()->sortBy('ordre');
        $tags = Tag::all()->sortBy('name');
        return view("bases/galeries/folders/index", ['folders' => $folders, 'tags' => $tags]);
    }

    public function create()
    {
        $this->authorize('admin', Folder::class);

        return view("bases/galeries/folders/create");
    }

    public function store(StoreFolder $request)
    {
        $this->authorize('admin', Folder::class);

        $validated = $request->validated();
        if ($request->ordre == null) {
            $request->merge(['ordre' => 100]);
        }
        $folder=Folder::create($request->all());

        return redirect(route('folder.index'))->with('status', 'Nouveau dossier ajouté');
    }

    public function show(Folder $folder)
    {
        $this->authorize('show', $folder);
        return view('bases/galeries/folders/show', ['pictures'=>$folder->pictures->sortBy('ordre'), 'folder'=>$folder]);
    }

    public function edit(Folder $folder)
    {
        $this->authorize('admin', $folder);

        return view('bases/galeries/folders/edit', ['folder'=>$folder]);
    }

    public function update(Folder $folder, StoreFolder $request)
    {
        $this->authorize('admin', $folder);

        $validated = $request->validated();

        $folder->name = $request->get('name');
        $folder->access = $request->get('access');

        if ($request->ordre == null) {
            $folder->ordre = 100;
        } else {
            $folder->ordre = $request->get('ordre');
        }

        $folder->save();

        return redirect(route('folder.index'))->with('status', 'Le dossier a bien été mis à jour');
    }

    public function destroy(Folder $folder)
    {
        $this->authorize('admin', $folder);
        $folder->delete();

        return redirect(route('folder.index'))->with('status', 'Le dossier a bien été supprimé');
    }

    public function ordre() {
        $this->authorize('admin', Folder::class);

        $folders = Folder::All()->sortBy('ordre');

        return view('bases/galeries/folders/ordre', ['folders'=>$folders]);
    }

    public function ordreUpdate(Folder $folder, StoreOrdreFolders $request) {
        $this->authorize('admin', $folder);

        $folder->update($request->all(['ordre']));

        return redirect()-> route('folder.ordre', [$folder])->with('status', 'L\'ordre a bien été mise à jour');
    }
}
