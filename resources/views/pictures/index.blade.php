@extends ("layouts.layout")

@section("CSS")
    <link href="/css/style_welcome.css" rel="stylesheet" media="all">
@endsection

@section("content")
    <h2>Toutes les photos @if (!empty($tag)) avec le tag : {{$tag->name}} @endif </h2>
    <p>
        @if (!empty($tag))
            <a href="{{route('picture.index')}}">Toutes les photos</a>
        @endif
        @foreach($tags as $tag)
            <a href="{{route('tag.show', $tag->slug)}}">{{$tag->name}}</a>
        @endforeach
    </p>
    <div id="menu">
        @foreach ($pictures as $picture)
            @can('show', $picture)
                <div class="miniature photo">
                    <a href="<?php if (!empty($tag)) { ?>{{route('tag.picture.show',[$tag->slug, $picture->slug])}} <?php } else { ?>{{route('picture.show', [$picture->slug])}}<?php } ?>">
                        <div class="button photo">
                            <div class="fond photo">
                                <h1>{{$picture->name}}</h1>
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