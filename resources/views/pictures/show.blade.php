@extends ("layouts.layout")

@section("nav")
    <div>
        @if (!empty($folder))
            <a href="{{route('folder.show', $folder->slug)}}"><h3><i class="fas fa-arrow-left"></i></h3></a>
        @elseif (!empty($tag))
            <a href="{{route('tag.show', $tag->slug)}}"><h3><i class="fas fa-arrow-left"></i></h3></a>
        @else
            <a href="{{route('picture.index')}}"><h3><i class="fas fa-arrow-left"></i></h3></a>
        @endif
    </div>
@endsection

@section("content")
    <div class="prev-next">
        <div>
            @if ($previous !== false)
                @if (!empty($folder))
                    <a id="previous" href="{{route('folder.picture.show', [$folder->slug, $previous->slug])}}"><i class="fas fa-arrow-left"></i></a>
                @elseif (!empty($tag))
                    <a id="previous" href="{{route('tag.picture.show', [$tag->slug, $previous->slug])}}"><i class="fas fa-arrow-left"></i></a>
                @else
                    <a id="previous" href="{{route('picture.show', [$previous->slug])}}"><i class="fas fa-arrow-left"></i></a>
                @endif
            @endif
        </div>
        <div>
            <a><i id="fullscreen" class="fas fa-expand-arrows-alt"></i></a>
        </div>
        <div>
            @if ($next !== false)
                @if (!empty($folder))
                    <a id="next" href="{{route('folder.picture.show', [$folder->slug, $next->slug])}}"><i class="fas fa-arrow-right"></i></a>
                @elseif (!empty($tag))
                    <a id="next" href="{{route('tag.picture.show', [$tag->slug, $next->slug])}}"><i class="fas fa-arrow-right"></i></a>
                @else
                    <a id="next" href="{{route('picture.show', [$next->slug])}}"><i class="fas fa-arrow-right"></i></a>
                @endif
            @endif
        </div>
    </div>
    <div class="containerImage">
        <p class="escape hidden"><i class="fas fa-compress-arrows-alt"></i></p>
        <img id="image" src="/storage/pictures/{{$picture->link}}" alt="{{$picture->alternative}}" class="pictures"/>
    </div>
    <h2>{{$picture->name}}</h2>
    <p class="tagsList">
        Tags :
        @foreach($picture->tags->sortBy('name') as $tag)
            <a href="{{route('tag.show', $tag->slug)}}"><button>{{$tag->name}}</button></a>
        @endforeach
    </p>
    <p>Dossier : <a href="{{route('folder.show', $folderTag->slug)}}"><button>{{$folderTag->name}}</button></a></p>
@endsection