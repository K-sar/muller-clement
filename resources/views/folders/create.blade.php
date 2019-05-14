@extends ("layouts.layout")

@section("CSS")
    <link href="css/style_folders.css" rel="stylesheet" media="all">
@endsection

@section("content")
    @if ($errors->any())
        <ul>{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
    @endif
    <form method="post" action="{{route('folder.store')}}">
        @csrf
        <div>
            <label>Nom</label>
            <input type="text" name="name" value="{{old("name")}}" />
        </div>
        <div>
            <label>Slug</label>
            <input type="text" name="slug" value="{{old("slug")}}" />
        </div>
        <div>
            <label>Accès</label>
            <input type="text" name="access" value="{{old("access")}}" />
        </div>
                    <input type="submit" />
    </form>
@endsection