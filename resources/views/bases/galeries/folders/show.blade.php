@extends ("layouts.layout")

@section('title')
    <title>Clément Muller - Galerie - {{$folder->name}}</title>
    <meta name="description" content="Liste des photos du dossier {{$folder->name}}"/>
@endsection

@section("content")
    <h2>{{$folder->name}}</h2>
    <div id="menu" class="relative">
        @can('admin', App\Folder::class)
            <div class="menu-auth">
                <p>
                    <a href="{{route('folder.picture.create', $folder->slug)}}"><button><i class="fas fa-plus"></i></button></a>
                    <a href="{{route('picture.ordre', $folder->slug)}}"><button><i class="fas fa-sort"></i></button></a>
                    <a href="{{route('picture.slider', $folder->slug)}}"><button><i class="far fa-images"></i></button></a>
                </p>
            </div>
        @endcan
        @foreach ($pictures as $picture)
            @can('show', $picture)
                <div class="miniature photo relative">
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
                </div>
            @endcan
        @endforeach
    </div>
@endsection
