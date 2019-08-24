@extends ("layouts.layout")

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
                <form method="post" action="{{route('picture.slider', [$folder->slug, $picture->slug])}}" class="sliderForm">
                    @csrf
                    <label>Slider :</label>
                    <input type="text" name="slider" value="{{old("slider")?:$picture->slider}}"/>
                    <input type="submit" value="Modifier"/>
                </form>
            </div>
        @endforeach
    </div>
@endsection