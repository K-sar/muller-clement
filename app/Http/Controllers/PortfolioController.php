<?php

namespace App\Http\Controllers;

use App\Portfolio;
use App\Http\Requests\StorePortfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::all();
        return view("portfolios/index", ['portfolios'=>$portfolios]);
    }

    public function create()
    {
        return view("portfolios/create");
    }

    public function store(StorePortfolio $request)
    {
        $validated = $request->validated();
        $portfolio=Portfolio::create($request->all());

        return redirect(route('portfolio.index'))->with('status', 'Nouveau dossier ajouté');
    }

    public function show(Portfolio $portfolio)
    {
        return view('portfolios/show', ['pictures'=>$portfolio->pictures, 'portfolio'=>$portfolio]);
    }

    public function edit(Portfolio $portfolio)
    {
        return view('portfolios/edit', ['portfolio'=>$portfolio]);
    }

    public function update(Portfolio $portfolio, StorePortfolio $request)
    {
        $validated = $request->validated();

        $portfolio->name = $request->get('name');
        $portfolio->picture = $request->get('picture');
        $portfolio->link = $request->get('link');
        $portfolio->save();

        return redirect(route('portfolio.index'))->with('status', 'L\entrée a bien été mise à jour');
    }

    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();

        return redirect(route('portfolio.index'))->with('status', 'L\'entrée a bien été supprimée');
    }
}
