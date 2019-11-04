<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Http\Requests\StoreOrdrePictures;
use App\Http\Requests\StoreSlider;
use App\Picture;
use App\Tag;
use App\Http\Requests\StorePicture;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;



class PictureController extends Controller{
//----------------------------------------------------------------------------------------------------------------------CRUD
    public function index($laserTag = null) {
        $tags = Tag::with('pictures')->get()->sortBy('name');
        foreach ($tags as $tag) {
            $pictures = $tag->pictures;
            if ($pictures->isEmpty()) {
                $tag->delete();
            }

            foreach ($pictures as $picture) {
                $user = Auth::user()??new User();
                if (!$user->can('show', $picture)) {
                    $pictures = $pictures->reject(function ($value, $key) use ($picture)
                    {
                        return $value == $picture;
                    });
                }
            }
            if ($pictures->isEmpty()) {
                $tags = $tags->reject(function ($value, $key) use ($tag)
                {
                    return $value == $tag;
                });
            }

        }

        if (!is_null($laserTag)) {
            $laserTag = Tag::where('slug', $laserTag)->first();
            return view("pictures/index", ['laserTag'=>$laserTag, 'tags'=>$tags->sortBy('name'), 'pictures'=>$laserTag->pictures]);
        } else {
            $pictures = Picture::all();
            return view("pictures/index", ['tags'=>$tags->sortBy('name'), 'pictures'=>$pictures]);
        }

    }

    public function create(Folder $folder) {
        $this->authorize('admin', Picture::class);
        $allTags = Tag::all()->sortBy('name');
        $allFolders = Folder::all()->sortBy('ordre');

        return view("pictures/create", ['folder'=>$folder, 'allTags'=>$allTags, 'allFolders'=>$allFolders]);
    }

    public function store(Folder $folder, StorePicture $request) {
        $this->authorize('admin', Picture::class);

        $file = $request->file('file');
        $link = md5($file).'.'.$file->getClientOriginalExtension();
        $img = Image::make($request->file('file'));
        $img->orientate();
        $img->save("../storage/app/public/pictures/".$link);
        $img->fit(300, 200)->orientate();
        $img->save("../storage/app/public/miniatures/pictures/".$link);

        $request->merge(['link'=>$link]);

        $validated = $request->validated();
        if ($request->ordre == null) {
            $request->merge(['ordre' => 100]);
        }

        $picture=Picture::create($request->all(['folder_id', 'access', 'link', 'name', 'info', 'alternative', 'ordre','slider']));

        $picture->saveTags($request->get('tags'));

        return redirect(route('folder.show', [$folder]));
    }
//----------------------------------------------------------------------------------------------------------------------Show&Cie
    public function show(Folder $folder, Picture $picture) {
        $this->authorize('show', $picture);

        $collection = $folder->pictures->sortBy('ordre');
        $collection = $this->prevNext($collection, $picture);
        $previous = $collection->first();
        $next = $collection->last();

        return view('pictures/show', ['folder'=>$folder, 'picture'=>$picture, 'folderTag'=>$folder, 'previous'=>$previous, 'next'=>$next]);
    }

    public function showTag(Tag $tag, Picture $picture) {
        $this->authorize('show', $picture);

        $collection = $tag->pictures;
        $collection = $this->prevNext($collection, $picture);
        $previous = $collection->first();
        $next = $collection->last();

        $folderTag = $picture->folder;

        return view('pictures/show', ['tag'=>$tag, 'picture'=>$picture, 'folderTag'=>$folderTag, 'previous'=>$previous, 'next'=>$next]);
    }

    public function showFromAll(Picture $picture) {
        $this->authorize('show', $picture);

        $collection = Picture::all();
        $collection = $this->prevNext($collection, $picture);
        $previous = $collection->first();
        $next = $collection->last();

        $folderTag = $picture->folder;

        return view('pictures/show', ['picture'=>$picture, 'folderTag'=>$folderTag, 'previous'=>$previous, 'next'=>$next]);
    }


    public function edit(Folder $folder, Picture $picture) {
        $this->authorize('admin', $picture);
        $allTags = Tag::all()->sortBy('name');
        $allFolders = Folder::all()->sortBy('ordre');

        return view('pictures/edit', ['folder'=>$folder, 'picture'=>$picture, 'allTags'=>$allTags, 'allFolders'=>$allFolders]);
    }

    public function update(Folder $folder, Picture $picture, StorePicture $request) {
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

        $validated = $request->validated();

        $picture->folder_id = $request->get('folder_id');
        $picture->access = $request->get('access');
        $picture->name = $request->get('name');
        $picture->info = $request->get('info');
        $picture->alternative = $request->get('alternative');
        $picture->slider = $request->get('slider');

        if ($request->ordre == null) {
            $picture->ordre = 100;
        } else {
            $picture->ordre = $request->get('ordre');
        }

        $picture->save();
        $picture->saveTags($request->get('tags'));

        return redirect()-> route('folder.show', [$folder])->with('status', 'La photo a bien été mise à jour');
    }

    public function destroy(Folder $folder, Picture $picture) {
        $this->authorize('admin', $picture);

        Storage::delete('/miniatures/pictures/'.$picture->link);
        Storage::delete('/pictures/'.$picture->link);
        $picture->delete();

        return redirect()-> route('folder.show', [$folder])->with('status', 'La photo a bien été supprimée');
    }

//----------------------------------------------------------------------------------------------------------------------Ordre et Slider
    public function slider (Folder $folder) {
        $this->authorize('admin', $folder);

        $picturesNotNull = $folder->pictures->filter(function($picture){
            return $picture->slider > 0;
        })->sortBy('slider');
        $picturesNull = $folder->pictures->filter(function($picture){
                return $picture->slider == 0;
            });
        $pictures = $picturesNotNull->merge($picturesNull);

        return view('pictures/slider', ['pictures'=>$pictures, 'folder'=>$folder]);
    }

    public function sliderUpdate(Folder $folder, Picture $picture, StoreSlider $request) {
        $this->authorize('admin', $picture);

        $picture->update($request->all(['slider']));

        return redirect()-> route('picture.slider', [$folder])->with('status', 'Le slider a bien été mise à jour');
    }

    public function ordre (Folder $folder) {
        $this->authorize('admin', $folder);

        return view('pictures/ordre', ['pictures'=>$folder->pictures->sortBy('ordre'), 'folder'=>$folder]);
    }

    public function ordreUpdate(Folder $folder, Picture $picture, StoreOrdrePictures $request) {
        $this->authorize('admin', $picture);

        $picture->update($request->all(['ordre']));

        return redirect()-> route('picture.ordre', [$folder])->with('status', 'L\'ordre a bien été mise à jour');
    }

    private function prevNext($collection, $picture) {
        $collection = $collection->getIterator();
        $current = current($collection);
        if ($current->id === $picture->id) {
            $next = next($collection);
            $previous = false;
        } else {
            while ($current->id !== $picture->id) {
                $current = next($collection);
            }
            $previous = prev($collection);
            $next = next($collection);
            $next = next($collection);
        }
        return collect([$previous, $next]);
    }

//----------------------------------------------------------------------------------------------------------------------FTP
    public function FTP() {
        $this->authorize('admin', Picture::class);

        $pictures = Picture::all();
        $FTPs = collect(Storage::files('pictures'))->map(function ($item, $key) {
            return substr($item, 9);
        });
        $collection = collect([]);
        foreach($pictures as $picture) {
            $link = $picture->link;
            $collection = $collection->concat([$link]);
        }
        foreach($FTPs as $FTP) {
            if ($collection->search($FTP) !== false) {
                $FTPs = $FTPs->reject(function ($value, $key) use ($FTP)
                {
                    return $value == $FTP;
                });
            }
        }
        return view("FTP/index", ['FTPs'=>$FTPs]);
    }

    public function FTPAdd($FTP) {
        $this->authorize('admin', Picture::class);
        $allTags = Tag::all()->sortBy('name');
        $allFolders = Folder::all()->sortBy('ordre');

        return view("FTP/add", ['FTP'=>$FTP, 'allTags'=>$allTags, 'allFolders'=>$allFolders]);
    }

    public function FTPstore($FTP, StorePicture $request) {
        $this->authorize('admin', Picture::class);

        list($file, $ext) = explode(".",$FTP);
        $link = md5($file).'.'.$ext;
        $img = Image::make("../storage/app/public/pictures/".$FTP);
        $img->orientate();
        $img->save("../storage/app/public/pictures/".$link);
        $img->fit(300, 200)->orientate();
        $img->save("../storage/app/public/miniatures/pictures/".$link);
        Storage::delete('/pictures/'.$FTP);

        $request->merge(['link'=>$link]);

        $validated = $request->validated();
        if ($request->ordre == null) {
            $request->merge(['ordre' => 100]);
        }

        $picture=Picture::create($request->all(['folder_id', 'access', 'link', 'name', 'info', 'alternative', 'ordre','slider']));

        $picture->saveTags($request->get('tags'));

        return redirect(route('FTP'));
    }

    public function FTPDelete($FTP) {
        $this->authorize('admin', Picture::class);

        Storage::delete('/pictures/'.$FTP);

        return redirect()-> route('FTP')->with('status', 'La photo a bien été supprimée');
    }
}
