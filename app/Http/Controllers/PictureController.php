<?php

namespace App\Http\Controllers;
use App\Folder;
use App\Picture;
use App\Http\Requests\StorePicture;


class PictureController extends Controller
{
    public function index(Folder $folder)
    {
        $Pictures = Picture::all();
        return view("pictures/index", ['folder'=>$folder, 'pictures'=>$Pictures]);
    }

    public function create(Folder $folder)
    {
        return view("pictures/create", ['folder'=>$folder]);
    }

    public function store(Folder $folder, StorePicture $request)
    {
        $request->merge(['folder_id'=>$folder->id]);
        $validated = $request->validated();
        $picture=Picture::create($request->all(['folder_id', 'access', 'link', 'name', 'info', 'alternative', 'slug']));
        return redirect(route('folder.show', [$folder]));
    }

    public function show(Folder $folder, Picture $picture)
    {
        return view('pictures/show', ['folder'=>$folder, 'picture'=>$picture]);
    }

    public function edit(Folder $folder, Picture $picture)
    {
        return view('pictures/edit', ['folder'=>$folder, 'picture'=>$picture]);
    }

    public function update(Folder $folder, Picture $picture, StorePicture $request)
    {
        $validated = $request->validated();

        $picture->name = $request->get('name');
        $picture->access = $request->get('access');
        $picture->save();

        return redirect()-> route('folder.show', [$folder])->with('status', 'La photo a bien été mise à jour');
    }

    public function destroy(Folder $folder, Picture $picture)
    {
        $picture->delete();

        return redirect()-> route('folder.show', [$folder])->with('status', 'La photo a bien été supprimée');
    }
}
