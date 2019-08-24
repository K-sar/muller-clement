<?php

namespace App\Http\Controllers;

use App\Base;
use App\Http\Requests\StoreBase;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BaseController extends Controller
{
    public function index() {
        $bases = Base::all()->sortBy('ordre');
        return view("welcome", ["bases" => $bases]);
    }

    public function create()
    {
        $this->authorize('admin', Base::class);

        return view("bases/create");
    }

    public function store(StoreBase $request)
    {
        $this->authorize('admin', Base::class);

        if ($request->file('file') !== null) {
            $file = $request->file('file');
            $link = md5($file) . '.' . $file->getClientOriginalExtension();
            $img = Image::make($request->file('file'));
            $img->fit(300, 200)->orientate();
            $img->save("../storage/app/public/miniatures/base/" . $link);
            $request->merge(['miniature'=>$link]);
        }

        $validated = $request->validated();
        $base=Base::create($request->all('name', 'link', 'miniature', 'ordre'));

        return redirect(route('/'))->with('status', 'Nouvelle entrée ajoutée');
    }

    public function edit(Base $base)
    {
        $this->authorize('admin', $base);

        return view('bases/edit', ['base'=>$base]);
    }

    public function update(Base $base, StoreBase $request)
    {
        $this->authorize('admin', $base);

        if ($request->file('file') !== null){
            $file = $request->file('file');
            $link = md5($file) . '.' . $file->getClientOriginalExtension();
            $img = Image::make($request->file('file'));
            $img->fit(300, 200)->orientate();
            $img->save("../storage/app/public/miniatures/base/" . $link);
            Storage::delete('/miniatures/base/'.$base->miniature);
            $base->miniature = $link;
        }
        $base->name = $request->get('name');
        $base->description = $request->get('description');
        $base->link = $request->get('link');

        if ($request->ordre == null) {
            $base->ordre = 100;
        } else {
            $base->ordre = $request->get('ordre');
        }

        $validated = $request->validated();

        $base->save();

        return redirect(route('/'))->with('status', 'L\'entrée a bien été mise à jour');
    }

    public function destroy(Base $base)
    {
        $this->authorize('admin', $base);
        Storage::delete('/miniatures/base/'.$base->miniature);
        $base->delete();

        return redirect(route('/'))->with('status', 'L\'entrée a bien été supprimée');
    }
}
