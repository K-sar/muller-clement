@extends ("layouts.layout")

@section("nav")
    @if (!empty($folder))
        <a href="{{route('folder.show', $folder->slug)}}">
            <h3>Retour</h3>
        </a>
    @elseif (!empty($tag))
        <a href="{{route('tag.show', $tag->slug)}}">
            <h3>Retour</h3>
        </a>
    @else
        <a href="{{route('picture.index')}}">
            <h3>Retour</h3>
        </a>
    @endif
@endsection

@section("content")
    <h3>Précdente</h3>
    <h3>Suivante</h3>
    <img src="/storage/pictures/{{$picture->link}}" alt="{{$picture->alternative}}" class="pictures"/>
    <h2>{{$picture->name}}</h2>
    <p>
        @foreach($picture->tags as $tag)
            <a href="{{route('tag.show', $tag->slug)}}">{{$tag->name}}</a>
        @endforeach
    </p>
@endsection