@extends ("layouts.layout")

@section('title')
    <title>Clément Muller - Portfolio - {{$portfolio->name}}</title>
    <meta name="description" content="Présentation du projet {{$portfolio->name}}"/>
@endsection

@section("content")
    <div class="container portfolio">
        <div class="box relative">
            @can('admin', App\Base::class)
                <div class="menu-auth">
                    <a href="{{route('portfolio.edit', $portfolio->slug)}}"><button><i class="far fa-edit"></i></button></a>
                    <form action="{{route('portfolio.destroy', $portfolio->slug)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><i class="far fa-trash-alt"></i></button>
                    </form>
                </div>
            @endcan
            <h2>{{$portfolio->name}}</h2>
            <p>{{$portfolio->description}}</p>
        </div>
        <div class="box">

            <a href="{{$portfolio->link}}" >
                <img src="/storage/portfolio/{{$portfolio->picture}}" alt="ilustration {{$portfolio->name}}" class="imgPortfolio"/>
            </a>
        </div>
    </div>

@endsection