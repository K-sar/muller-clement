@extends ("layouts.layout")

@section('title')
    <title>Clément Muller - Portfolio</title>
    <meta name="description" content="Liste des projets sur lesquels j'ai travaillé"/>
@endsection

@section("content")
    <h2>Portfolio</h2>

    <div id="menu" class="relative">
        @can('admin', App\Base::class)
            <div class="menu-auth">
                <a href="{{route('portfolio.create')}}"><button><i class="fas fa-folder-plus"></i></button></a>
            </div>
        @endcan
        @foreach ($portfolios as $portfolio)
            <div class="miniature relative">
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
            </div>
        @endforeach
    </div>
@endsection