@extends ("layouts.layout")

@section("CSS")
    <link href="CSS/style_folders.css" rel="stylesheet" media="all">
@endsection

@section("content")
    @if ($errors->any())
        <ul>{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
    @endif
    <form method="post" action="{{route('folder_store')}}">
        @csrf
        <input type="text" name="name" value="{{old("name")}}" />
        <input type="text" name="slug" value="{{old("slug")}}" />
        <input type="text" name="access" value="{{old("access")}}" />
        <input type="submit" />
    </form>
@endsection