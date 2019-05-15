@extends ("layouts.layout")

@section("CSS")
    <link href="/css/style_welcome.css" rel="stylesheet" media="all">
@endsection

@section("content")


    <h2>Toutes les photos</h2>
    <a href="{{route('picture.create')}}"><button>Ajouter une photo</button></a>
    <div id="menu">
        @foreach ($pictures as $picture)
            <div class="miniature photo">
                <a href="{{route('picture.show', $picture->id)}}">
                    <div class="button">
                        <div class="fond">
                            <h1>{{$picture->nom}}</h1>
                        </div>
                        <h2>
                            {{$picture->nom}}
                        </h2>
                    </div>
                </a>
                <div class="menu-auth">
                    <a href="{{route('picture.edit', $folder->id)}}"><button>Modifier</button></a>
                    <form action="{{ route('picture.destroy', $folder->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection