@extends ("layouts.layout")

@section("CSS")
    <link href="css/style_pictures.css" rel="stylesheet" media="all">
@endsection

@section("content")
    <h2>{{$picture->info}}</h2>
@endsection