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
                    <a href="{{route('folder.picture.show', [$folder->slug, $previous->slug])}}"><h3>Précédente</h3></a>
                @elseif (!empty($tag))
                    <a href="{{route('tag.picture.show', [$tag->slug, $previous->slug])}}"><h3>Précédente</h3></a>
                @else
                    <a href="{{route('picture.show', [$previous->slug])}}"><h3>Précédente</h3></a>
                @endif
            @endif
        </div>
        <div>
            <a><h3>Plein écran</h3></a>
        </div>
        <div>
            @if ($next !== false)
                @if (!empty($folder))
                    <a href="{{route('folder.picture.show', [$folder->slug, $next->slug])}}"><h3>Suivante</h3></a>
                @elseif (!empty($tag))
                    <a href="{{route('tag.picture.show', [$tag->slug, $next->slug])}}"><h3>Suivante</h3></a>
                @else
                    <a href="{{route('picture.show', [$next->slug])}}"><h3>Suivante</h3></a>
                @endif
            @endif
        </div>
    </div>
    <img src="/storage/pictures/{{$picture->link}}" alt="{{$picture->alternative}}" class="pictures"/>
    <h2>{{$picture->name}}</h2>
    <p>
        @foreach($picture->tags as $tag)
            <a href="{{route('tag.show', $tag->slug)}}"><button>{{$tag->name}}</button></a>
        @endforeach
    </p>
@endsection