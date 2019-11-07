@extends ("layouts.layout")

@section('title')
    <title>Clément Muller - Accueil</title>
    <meta name="description" content="Mon site, avec mon CV, mon portfolio et mes photos"/>
@endsection

@section("content")
    @can('admin', App\Base::class)
        <p>
            <a href="{{route('base.create')}}"><button>Ajouter une entrée</button></a>
        </p>
    @endcan
    <div id="menu">
        @foreach ($bases as $base)
            <div class="miniature">
                <a href="{{route($base->link)}}">
                    <div class="button">
                        <div class="fond descriptionFond">
                            <img src="/storage/miniatures/base/{{$base->miniature}}" alt="miniature de {{$base->name}}"/>
                            <figure class="description"><p>{{$base->description}}</p></figure>
                        </div>
                        <h2>
                            {{$base->name}}
                        </h2>
                    </div>
                </a>
                @can('admin', $base)
                    <div class="menu-auth">
                        <a href="{{route('base.edit', $base->id)}}"><button><i class="far fa-edit"></i></button></a>
                        <form action="{{route('base.destroy', $base->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </div>
                @endcan
            </div>
        @endforeach
    </div><!--menu-->
@endsection