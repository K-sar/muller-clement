<?php

namespace App\Http\Controllers;

use App\Picture;
use App\Http\Requests\StorePicture;


class PictureController extends Controller
{
    public function index()
    {
        $Pictures = Picture::all();
        return view("pictures/index", ['pictures'=>$Pictures]);
    }

    public function create($folder_id)
    {
        return view("pictures/create", ['folder_id'=>$folder_id]);
    }

    public function store(StorePicture $request)
    {

        $validated = $request->validated();
        $picture=Picture::create($request->all(['folder_id', 'access', 'link', 'name', 'info', 'alternative', 'slug']));
        return redirect('folder.picture.index', $request->folder_id);
    }

    public function show($id)
    {
        $picture = Picture::find($id);

        return view('pictures/show', ['picture'=>$picture]);
    }

    public function edit($id)
    {
        $picture = Picture::find($id);

        return view('pictures/edit', ['picture'=>$picture]);
    }

    public function update(StorePicture $request, $id)
    {
        $validated = $request->validated();

        $picture = Picture::find($id);
        $picture->name = $request->get('name');
        $picture->slug = $request->get('slug');
        $picture->access = $request->get('access');
        $picture->save();

        return redirect('/galerie/picture')->with('status', 'La photo a bien été mise à jour');
    }

    public function destroy($id)
    {
        $picture = Picture::find($id);
        $picture->delete();

        return redirect('/galerie/picture')->with('status', 'La photo a bien été supprimée');
    }
}
