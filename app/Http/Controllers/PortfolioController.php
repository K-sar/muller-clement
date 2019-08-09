<?php

namespace App\Http\Controllers;

use App\Portfolio;
use App\Http\Requests\StorePortfolio;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::all();
        return view("portfolios/index", ['portfolios'=>$portfolios]);
    }

    public function create()
    {
        $this->authorize('admin', Portfolio::class);

        return view("portfolios/create");
    }

    public function store(StorePortfolio $request)
    {
        $this->authorize('admin', Portfolio::class);

        if ($request->file('file') !== null) {
            $file = $request->file('file');
            $link = md5($file) . '.' . $file->getClientOriginalExtension();
            $img = Image::make($request->file('file'));
            $img->fit(500, 500)->orientate();
            $img->save("../storage/app/public/portfolio/" . $link);
            $img->fit(300, 200)->orientate();
            $img->save("../storage/app/public/miniatures/portfolio/" . $link);
            $request->merge(['picture'=>$link]);
        }



        $validated = $request->validated();
        $portfolio=Portfolio::create($request->all('name', 'description', 'link', 'picture'));


        return redirect(route('portfolio.index'))->with('status', 'Nouvelle entrée ajoutée');
    }

    public function show(Portfolio $portfolio)
    {
        return view('portfolios/show', ['portfolio'=>$portfolio]);
    }

    public function edit(Portfolio $portfolio)
    {
        $this->authorize('admin', $portfolio);

        return view('portfolios/edit', ['portfolio'=>$portfolio]);
    }

    public function update(Portfolio $portfolio, StorePortfolio $request)
    {
        $this->authorize('admin', $portfolio);

        if ($request->file('file') !== null){
            $file = $request->file('file');
            $link = md5($file) . '.' . $file->getClientOriginalExtension();
            $img = Image::make($request->file('file'));
            $img->fit(500, 500)->orientate();
            $img->save("../storage/app/public/portfolio/" . $link);
            $img->fit(300, 200)->orientate();
            $img->save("../storage/app/public/miniatures/portfolio/" . $link);
            Storage::delete('/miniatures/portfolio/'.$portfolio->picture);
            Storage::delete('/portfolio/'.$portfolio->picture);
            $portfolio->picture = $link;
        }

        $validated = $request->validated();

        $portfolio->name = $request->get('name');
        $portfolio->link = $request->get('link');
        $portfolio->description = $request->get('description');
        $portfolio->save();

        return redirect(route('portfolio.index'))->with('status', 'L\'entrée a bien été mise à jour');
    }

    public function destroy(Portfolio $portfolio)
    {
        $this->authorize('admin', $portfolio);

        Storage::delete('/miniatures/portfolio/'.$portfolio->picture);
        Storage::delete('/portfolio/'.$portfolio->picture);
        $portfolio->delete();

        return redirect(route('portfolio.index'))->with('status', 'L\'entrée a bien été supprimée');
    }
}
