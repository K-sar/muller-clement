@extends ("layouts.layout")

@section('title')
    <title>Clément Muller - Galerie - {{$folder->name}}</title>
    <meta name="description" content="Liste des photos du dossier {{$folder->name}}"/>
@endsection

@section("content")
    <h2>{{$folder->name}}</h2>
    @can('admin', App\Folder::class)
        <p>
            <a href="{{route('folder.picture.create', $folder->slug)}}"><button>Ajouter une photo</button></a>
            <a href="{{route('picture.ordre', $folder->slug)}}"><button>Editer l'ordre</button></a>
            <a href="{{route('picture.slider', $folder->slug)}}"><button>Editer le slider</button></a>
        </p>
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
                            <a href="{{route('folder.picture.edit', [$folder->slug, $picture->slug])}}"><button><i class="far fa-edit"></i></i></button></a>
                            <form action="{{ route('folder.picture.destroy', [$folder->slug, $picture->slug])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </div>
                    @endcan
                </div>
            @endcan
        @endforeach
    </div>
@endsection
