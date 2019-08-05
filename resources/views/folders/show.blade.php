@extends ("layouts.layout")

@section("content")
    <h2>{{$folder->name}}</h2>
    @can('admin', App\Folder::class)
        <a href="{{route('folder.picture.create', $folder->slug)}}"><button>Ajouter une photo</button></a>
        <a href="{{route('folder.slider', $folder->slug)}}"><button>Editer le slider</button></a>
    @endcan
    <div id="menu">
        @foreach ($pictures as $picture)
            @can('show', $picture)
                <div class="miniature photo">
                    <a href="{{route('folder.picture.show',[$folder->slug, $picture->slug])}}">
                        <div class="button photo">
                            <div class="fond photo">
                                <img src="/storage/miniatures/pictures/{{$picture->link}}" alt="{{$picture->alternative}}"/>
                            </div>
                            <h2>
                                {{$picture->name}}
                            </h2>
                        </div>
                    </a>
                    @can('admin', $picture)
                        <div class="menu-auth">
                            <a href="{{route('folder.picture.edit', [$folder->slug, $picture->slug])}}"><button>Modifier</button></a>
                            <form action="{{ route('folder.picture.destroy', [$folder->slug, $picture->slug])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Supprimer</button>
                            </form>
                        </div>
                    @endcan
                </div>
            @endcan
        @endforeach
    </div>
@endsection