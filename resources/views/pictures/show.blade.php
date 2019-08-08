@extends ("layouts.layout")

@section("nav")
    @if (!empty($folder))
        <a href="{{route('folder.show', $folder->slug)}}"><h3>Retour</h3></a>
    @elseif (!empty($tag))
        <a href="{{route('tag.show', $tag->slug)}}"><h3>Retour</h3></a>
    @else
        <a href="{{route('picture.index')}}"><h3>Retour</h3></a>
    @endif
@endsection

@section("content")
    <div class="prev-next">
        <div>
            @if ($previous !== false)
                @if (!empty($folder))
                    <a id="previous" href="{{route('folder.picture.show', [$folder->slug, $previous->slug])}}"><h3>Précédente</h3></a>
                @elseif (!empty($tag))
                    <a id="previous" href="{{route('tag.picture.show', [$tag->slug, $previous->slug])}}"><h3>Précédente</h3></a>
                @else
                    <a id="previous" href="{{route('picture.show', [$previous->slug])}}"><h3>Précédente</h3></a>
                @endif
            @endif
        </div>
        <div>
            <a><h3 id="fullscreen">Plein écran</h3></a>
        </div>
        <div>
            @if ($next !== false)
                @if (!empty($folder))
                    <a id="next" href="{{route('folder.picture.show', [$folder->slug, $next->slug])}}"><h3>Suivante</h3></a>
                @elseif (!empty($tag))
                    <a id="next" href="{{route('tag.picture.show', [$tag->slug, $next->slug])}}"><h3>Suivante</h3></a>
                @else
                    <a id="next" href="{{route('picture.show', [$next->slug])}}"><h3>Suivante</h3></a>
                @endif
            @endif
        </div>
    </div>
    <div id="image">
        <p class="escape hidden">X</p>
        <img id="image" src="/storage/pictures/{{$picture->link}}" alt="{{$picture->alternative}}" class="pictures"/>
    </div>
    <h2>{{$picture->name}}</h2>
    <p>Dossier : <a href="{{route('folder.show', $folderTag->slug)}}"><button>{{$folderTag->name}}</button></a></p>
    <p>
        Tags :
        @foreach($picture->tags as $tag)
            <a href="{{route('tag.show', $tag->slug)}}"><button>{{$tag->name}}</button></a>
        @endforeach
    </p>
@endsection