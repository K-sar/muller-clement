<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Picture;
use App\Tag;
use App\Http\Requests\StorePicture;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;



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

        $file = $request->file('file');
        $link = md5($file).'.'.$file->getClientOriginalExtension();
        $img = Image::make($request->file('file'));
        $img->orientate();
        $img->save("../storage/app/public/pictures/".$link);
        $img->fit(300, 200)->orientate();
        $img->save("../storage/app/public/miniatures/pictures/".$link);

        $request->merge(['folder_id'=>$folder->id, 'link'=>$link]);

        $validated = $request->validated();
        if ($request->slider == null) {
            $request->merge(['slider' => 100]);
        }

        $picture=Picture::create($request->all(['folder_id', 'access', 'link', 'name', 'info', 'alternative', 'slider']));

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

        if ($request->file('file') !== null) {
            $file = $request->file('file');
            $link = md5($file) . '.' . $file->getClientOriginalExtension();
            $img = Image::make($request->file('file'));
            $img->orientate();
            $img->save("../storage/app/public/pictures/" . $link);
            $img->fit(300, 200)->orientate();
            $img->save("../storage/app/public/miniatures/pictures/" . $link);
            Storage::delete('/miniatures/pictures/'.$picture->link);
            Storage::delete('/pictures/'.$picture->link);
            $picture->link = $link;
        }

        if ($request->slider == null) {
            $picture->slider = 100;
        }

        $validated = $request->validated();

        $picture->save($request->all(['folder_id', 'access', 'link', 'name', 'info', 'alternative', 'slider']));
        $picture->saveTags($request->get('tags'));

        return redirect()-> route('folder.show', [$folder])->with('status', 'La photo a bien été mise à jour');
    }

    public function destroy(Folder $folder, Picture $picture)
    {
        $this->authorize('admin', $picture);

        Storage::delete('/miniatures/pictures/'.$picture->link);
        Storage::delete('/pictures/'.$picture->link);
        $picture->delete();

        return redirect()-> route('folder.show', [$folder])->with('status', 'La photo a bien été supprimée');
    }

    public function slider(Folder $folder, Picture $picture, StorePicture $request) {
        dd('plop');
        $this->authorize('admin', $picture);

        $picture->save($request->all(['slider']));

        return redirect()-> route('folder.slider', [$folder])->with('status', 'Le slider a bien été mise à jour');
    }
}
