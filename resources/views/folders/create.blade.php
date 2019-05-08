@extends ("layouts.layout")

@section("CSS")
    <link href="CSS/style_folders.css" rel="stylesheet" media="all">
@endsection

@section("content")
    <form method="post" action="{{route('folder_store')}}">
        @csrf
        <input type="text" name="name" />
        <input type="text" name="slug" />
        <input type="text" name="access" />
        <input type="submit" />
    </form>
@endsection