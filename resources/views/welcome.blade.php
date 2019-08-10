@extends ("layouts.layout")

@section("content")
    @can('admin', App\Base::class)
        <p>
            <a href="{{route('base.create')}}"><button>Ajouter un dossier</button></a>
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
                        <a href="{{route('base.edit', $base->id)}}"><button>Modifier</button></a>
                        <form action="{{route('base.destroy', $base->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </div>
                @endcan
            </div>
        @endforeach
    </div><!--menu-->
@endsection