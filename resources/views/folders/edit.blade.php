@extends ("layouts.layout")

@section("CSS")
    <link href="CSS/style_folders.css" rel="stylesheet" media="all">
@endsection

@section("content")
    @if ($errors->any())
        <ul>{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
    @endif
    <form method="post" action="{{route('folder.update', $folder->id)}}">
        @method('PATCH')
        @csrf
        <input type="text" name="name" value="{{$folder->name}}" />
        <input type="text" name="slug" value="{{$folder->slug}}" />
        <input type="text" name="access" value="{{$folder->access}}" />
        <input type="submit" />
    </form>
@endsection