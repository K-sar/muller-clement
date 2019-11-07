@extends ("layouts.layout")

@section('title')
    <title>Clément Muller - Portfolio</title>
    <meta name="description" content="Liste des projets sur lesquels j'ai travaillé"/>
@endsection

@section("content")

<h2>Portfolio</h2>
@can('admin', App\Base::class)
    <a href="{{route('portfolio.create')}}"><button>Ajouter une entrée</button></a>
@endcan
<div id="menu">
    @foreach ($portfolios as $portfolio)
        <div class="miniature">
            <a href="{{route('portfolio.show', [$portfolio->slug])}}">
                <div class="button">
                    <div class="fond descriptionFond">
                        <img src="/storage/miniatures/portfolio/{{$portfolio->picture}}" alt="miniature {{$portfolio->name}}"/>
                        <figure class="description"><p>{{$portfolio->description}}</p></figure>
                    </div>
                    <h2>
                        {{$portfolio->name}}
                    </h2>
                </div>
            </a>
            @can('admin', App\Base::class)
                <div class="menu-auth">
                    <a href="{{route('portfolio.edit', $portfolio->slug)}}"><button><i class="far fa-edit"></i></i></button></a>
                    <form action="{{route('portfolio.destroy', $portfolio->slug)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><i class="far fa-trash-alt"></i></button>
                    </form>
                </div>
            @endcan
        </div>
    @endforeach
</div>
@endsection