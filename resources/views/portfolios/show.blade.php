@extends ("layouts.layout")

@section("content")
    <h2>{{$portfolio->name}}</h2>
    <a href="{{$portfolio->link}}">
        <img src="/storage/portfolio/{{$portfolio->picture}}" alt="ilustration {{$portfolio->name}}" class="pictures"/>
    </a>
    <p>{{$portfolio->description}}</p>
@endsection