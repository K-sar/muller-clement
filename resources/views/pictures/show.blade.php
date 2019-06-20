@extends ("layouts.layout")

@section("CSS")
    <link href="/css/style_welcome.css" rel="stylesheet" media="all">
@endsection

@section("nav")
    <a href="<?php if (!empty($folder)) { ?> {{route('folder.show', $folder->slug)}}
        <?php } elseif (!empty($tag)) { ?> {{route('tag.show', $tag->slug)}}
        <?php } else {?> {{route('picture.index')}} <?php } ?> ">
        <h3>Retour</h3>
    </a>
@endsection
@section("content")
    <h2>{{$picture->name}}</h2>
    <p>
        @foreach($picture->tags as $tag)
            <a href="{{route('tag.show', $tag->slug)}}">{{$tag->name}}</a>
        @endforeach
    </p>
@endsection