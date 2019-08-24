@extends ("layouts.layout")

@section('title')
    <title>Clément Muller - Galerie</title>
    <meta name="description" content="Liste des dossiers de la Galerie"/>
@endsection

@section("content")

<h2>La Galerie Photo</h2>

@can('admin', App\Folder::class)
    <p>
        <a href="{{route('folder.create')}}"><button>Ajouter un dossier</button></a>
        <a href="{{route('folder.ordre')}}"><button>Editer l'ordre</button></a>
    </p>
@endcan

<div id="menu">
    @foreach ($folders as $folder)
        @can('show', $folder)
            <div class="miniature">
                <a href="{{route('folder.show', $folder->slug)}}">
                    <div class="button">
                        <div class="fond">
                            @if ($folder->slider_pictures->count() > 4)
                                <div class="slider">
                                    <figure>
                                        @foreach ($folder->slider_pictures as $picture)
                                            <img src="/storage/miniatures/pictures/{{$picture->link}}" alt="{{$picture->alternative}}"/>
                                        @endforeach
                                            <img src="/storage/miniatures/pictures/{{$folder->slider_pictures->first()->link}}" alt="{{$folder->slider_pictures->first()->alternative}}"/>

                                    </figure>
                                </div>
                            @elseif ($folder->slider_pictures->count() > 0)
                                <img src="/storage/miniatures/pictures/{{$folder->slider_pictures->first()->link}}" alt="{{$folder->slider_pictures->first()->alternative}}"/>
                            @else
                            @endif
                        </div>
                        <h2>
                            {{$folder->name}}
                        </h2>
                    </div>
                </a>
                @can('admin', $folder)
                    <div class="menu-auth">
                        <a href="{{route('folder.edit', $folder->slug)}}"><button>Modifier</button></a>
                        <form action="{{route('folder.destroy', $folder->slug)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </div>
                @endcan
            </div>
        @endcan
    @endforeach
    <p class="tagsList">
        <a href="{{route('picture.index')}}"><button>Toutes les photos</button></a>
        @foreach($tags as $tag)
            <a href="{{route('tag.show', $tag->slug)}}"><button>{{$tag->name}}</button></a>
        @endforeach
    </p>
</div>
@endsection