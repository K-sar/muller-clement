@extends ("layouts.layout")

@section("CSS")
    <link href="/css/style_welcome.css" rel="stylesheet" media="all">
@endsection

@section("nav")
    <a href="{{route('folder.show', $picture->folder_id)}}">
        <h3>Retour</h3>
    </a>
@endsection
@section("content")
    <h2>{{$picture->name}}</h2>
@endsection