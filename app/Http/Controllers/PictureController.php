<?php

namespace App\Http\Controllers;
use App\Folder;
use App\Picture;
use App\Tag;
use App\Http\Requests\StorePicture;


class PictureController extends Controller
{
    public function index($tag = null)
    {
        if (!is_null($tag))
        {
            $tag = Tag::where('slug', $tag)->first();

            return view("pictures/index", ['tag'=>$tag, 'pictures'=>$tag->pictures]);
        } else {
            $pictures = Picture::all();
            return view("pictures/index", ['pictures'=>$pictures]);
        }
    }

    public function create(Folder $folder)
    {
        $this->authorize('admin', Picture::class);

        return view("pictures/create", ['folder'=>$folder]);
    }

    public function store(Folder $folder, StorePicture $request)
    {
        $this->authorize('admin', Picture::class);

        $request->merge(['folder_id'=>$folder->id]);

        $validated = $request->validated();
        $picture=Picture::create($request->all(['folder_id', 'access', 'link', 'name', 'info', 'alternative']));
        $picture->saveTags($request->get('tags'));

        return redirect(route('folder.show', [$folder]));
    }

    public function show(Folder $folder, Picture $picture)
    {
        $this->authorize('show', $picture);

        return view('pictures/show', ['folder'=>$folder, 'picture'=>$picture]);
    }

    public function showTag(Tag $tag, Picture $picture)
    {
        $this->authorize('show', $picture);

        return view('pictures/show', ['tag'=>$tag, 'picture'=>$picture]);
    }

    public function showFromAll(Picture $picture)
    {
        $this->authorize('show', $picture);

        return view('pictures/show', ['picture'=>$picture]);
    }


    public function edit(Folder $folder, Picture $picture)
    {
        $this->authorize('admin', $picture);

        return view('pictures/edit', ['folder'=>$folder, 'picture'=>$picture]);
    }

    public function update(Folder $folder, Picture $picture, StorePicture $request)
    {
        $this->authorize('admin', $picture);

        $validated = $request->validated();

        $picture->save($request->all(['folder_id', 'access', 'link', 'name', 'info', 'alternative']));
        $picture->saveTags($request->get('tags'));

        return redirect()-> route('folder.show', [$folder])->with('status', 'La photo a bien été mise à jour');
    }

    public function destroy(Folder $folder, Picture $picture)
    {
        $this->authorize('admin', $picture);

        $picture->delete();

        return redirect()-> route('folder.show', [$folder])->with('status', 'La photo a bien été supprimée');
    }
}
