@extends ("layouts.layout")

@section("CSS")
    <link href="/css/style_welcome.css" rel="stylesheet" media="all">
@endsection

@section("content")

    <h2>Toutes les photos</h2>
    <a href="{{route('folder.picture.create', $folder->slug)}}"><button>Ajouter une photo</button></a>
    <div id="menu">
        @foreach ($pictures as $picture)
            <div class="miniature photo">
                <a href="{{route('folder.picture.show',[$folder->slug, $picture->slug])}}">
                    <div class="button">
                        <div class="fond">
                            <h1>{{$picture->name}}</h1>
                        </div>
                        <h2>
                            {{$picture->name}}
                        </h2>
                    </div>
                </a>
                <div class="menu-auth">
                    <a href="{{route('folder.picture.edit', [$folder->slug, $picture->slug])}}"><button>Modifier</button></a>
                    <form action="{{ route('folder.picture.destroy', [$folder->slug, $picture->slug])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection