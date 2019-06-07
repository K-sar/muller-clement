<?php

namespace App\Http\Controllers;

use App\Portfolio;
use App\Http\Requests\StorePortfolio;

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

        $validated = $request->validated();
        $portfolio=Portfolio::create($request->all());

        return redirect(route('portfolio.index'))->with('status', 'Nouvelle entrée ajoutée');
    }

    public function edit(Portfolio $portfolio)
    {
        $this->authorize('admin', $portfolio);

        return view('portfolios/edit', ['portfolio'=>$portfolio]);
    }

    public function update(Portfolio $portfolio, StorePortfolio $request)
    {
        $this->authorize('admin', $portfolio);

        $validated = $request->validated();

        $portfolio->name = $request->get('name');
        $portfolio->picture = $request->get('picture');
        $portfolio->link = $request->get('link');
        $portfolio->save();

        return redirect(route('portfolio.index'))->with('status', 'L\'entrée a bien été mise à jour');
    }

    public function destroy(Portfolio $portfolio)
    {
        $this->authorize('admin', $portfolio);

        $portfolio->delete();

        return redirect(route('portfolio.index'))->with('status', 'L\'entrée a bien été supprimée');
    }
}
