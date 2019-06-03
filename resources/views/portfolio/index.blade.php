@extends ("layouts.layout")

@section("CSS")
    <link href="/css/style_welcome.css" rel="stylesheet" media="all">
@endsection

@section("content")

<h2>La Galerie Photo</h2>
<a href="{{route('portfolio.create')}}"><button>Ajouter une entrée</button></a>
<div id="menu">
    @foreach ($portfolios as $portfolio)
        <div class="miniature">
            <a href="{{$portfolio->link)}}">
                <div class="button">
                    <div class="fond">
                        <h1>{{$portfolio->name}}</h1>
                    </div>
                    <h2>
                        {{$portfolio->name}}
                    </h2>
                </div>
            </a>
            <div class="menu-auth">
                <a href="{{route('portfolio.edit', $portfolio->id)}}"><button>Modifier</button></a>
                <form action="{{route('portfolio.destroy', $portfolio->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection