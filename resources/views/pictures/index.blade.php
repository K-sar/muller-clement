@extends ("layouts.layout")

@section("content")
    <h2>Toutes les photos @if (!empty($laserTag)) avec le tag : {{$laserTag->name}} @endif </h2>
    <p>
        @if (!empty($laserTag))
            <a href="{{route('picture.index')}}"><button>Toutes les photos</button></a>
        @endif
        @foreach($tags as $tag)
                <a href="{{route('tag.show', $tag->slug)}}"><button>{{$tag->name}}</button></a>
        @endforeach
    </p>
    <div id="menu">
        @foreach ($pictures as $picture)
            @can('show', $picture)
                <div class="miniature photo">
                    <a href="<?php if (!empty($laserTag)) { ?>{{route('tag.picture.show',[$laserTag->slug, $picture->slug])}} <?php } else { ?>{{route('picture.show', [$picture->slug])}}<?php } ?>">
                        <div class="button photo">
                            <div class="fond photo">
                                <img src="/storage/miniatures/pictures/{{$picture->link}}" alt="{{$picture->alt}}"/>
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