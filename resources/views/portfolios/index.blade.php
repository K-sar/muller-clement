@extends ("layouts.layout")

@section("content")

<h2>Portfolio</h2>
@can('admin', App\Portfolio::class)
    <a href="{{route('portfolio.create')}}"><button>Ajouter une entrée</button></a>
@endcan
<div id="menu">
    @foreach ($portfolios as $portfolio)
        <div class="miniature">
            <a href="{{route('portfolio.show', [$portfolio->slug])}}">
                <div class="button">
                    <div class="fond">
                        <img src="/storage/miniatures/portfolio/{{$portfolio->picture}}" alt="miniature {{$portfolio->name}}"/>
                    </div>
                    <h2>
                        {{$portfolio->name}}
                    </h2>
                </div>
            </a>
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
        </div>
    @endforeach
</div>
@endsection