@extends ("layouts.layout")

@section ("nav")
    <a href="{{route('folder.show', $folder->slug)}}"><h3>Retour</h3></a>
@endsection


@section("content")
    <h2>Modifier le slider</h2>
    <div id="menu">
        @foreach ($pictures as $picture)
            <div class="miniature photo">
                <div class="button photo">
                    <div class="fond photo">
                        <img src="/storage/miniatures/pictures/{{$picture->link}}" alt="{{$picture->alternative}}"/>
                    </div>
                </div>
                <form method="post" action="{{route('picture.slider.update', [$folder->slug, $picture->slug])}}" class="sliderForm">
                    @csrf
                    <label>Slider :</label>
                    <input type="text" name="slider" value="{{old("slider")?:$picture->slider}}"/>
                    <input type="submit" value="Modifier"/>
                </form>
            </div>
        @endforeach
    </div>
@endsection