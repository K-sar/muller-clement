@extends ("layouts.layout")

@section('title')
    <title>Clément Muller - Portfolio - {{$portfolio->name}}</title>
    <meta name="description" content="Présentation du projet {{$portfolio->name}}"/>
@endsection

@section("content")
    <div class="container portfolio">
        <div class="box">
            <h2>{{$portfolio->name}}</h2>
            <p>{{$portfolio->description}}</p>
        </div>
        <div class="box">
            <a href="{{$portfolio->link}}" >
                <img src="/storage/portfolio/{{$portfolio->picture}}" alt="ilustration {{$portfolio->name}}" class="imgPortfolio"/>
            </a>
        </div>
    </div>
    @can('admin', $portfolio)
        <div class="menu-auth">
            <a href="{{route('portfolio.edit', $portfolio->slug)}}"><button>Modifier</button></a>
            <form action="{{route('portfolio.destroy', $portfolio->slug)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
            </form>
        </div>
    @endcan

@endsection