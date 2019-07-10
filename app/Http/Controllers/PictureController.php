<?php

namespace App\Http\Controllers;
use App\Folder;
use App\Picture;
use App\Tag;
use App\Http\Requests\StorePicture;
use App\User;
use Illuminate\Support\Facades\Auth;


class PictureController extends Controller
{
    public function index($laserTag = null)
    {
        $tags = Tag::with('pictures')->get();
        foreach ($tags as $tag)
        {
            $pictures = $tag->pictures;

            if ($pictures->isEmpty())
            {
                $tag->delete();
            }

            foreach ($pictures as $picture)
            {
                $user = Auth::user()??new User();
                if (!$user->can('show', $picture))
                {
                    $pictures = $pictures->reject(function ($value, $key) use ($picture)
                    {
                        return $value == $picture;
                    });
                }
            }
            if ($pictures->isEmpty())
            {
                $tags = $tags->reject(function ($value, $key) use ($tag)
                {
                    return $value == $tag;
                });
            }

        }

        if (!is_null($laserTag))
        {
            $tag = Tag::where('slug', $laserTag)->first();

            return view("pictures/index", ['tag'=>$tag, 'tags'=>$tags, 'pictures'=>$tag->pictures]);
        } else {
            $pictures = Picture::all();
            return view("pictures/index", ['tags'=>$tags, 'pictures'=>$pictures]);
        }

    }

    public function create(Folder $folder)
    {
        $this->authorize('admin', Picture::class);
        $allTags = Tag::all();

        return view("pictures/create", ['folder'=>$folder, 'allTags'=>$allTags]);
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
        $allTags = Tag::all();

        return view('pictures/edit', ['folder'=>$folder, 'picture'=>$picture, 'allTags'=>$allTags]);
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
