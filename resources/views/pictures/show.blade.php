@extends ("layouts.layout")

@section("CSS")
    <link href="/css/style_picture.css" rel="stylesheet" media="all">
@endsection

@section("content")
    <h2>{{$picture->name}}</h2>
@endsection