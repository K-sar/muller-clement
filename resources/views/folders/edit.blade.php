@extends ("layouts.layout")

@section("CSS")
    <link href="/css/style_welcome.css" rel="stylesheet" media="all">
@endsection

@section("content")
    @if ($errors->any())
        <ul>{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
    @endif
    <form method="post" action="{{route('folder.update', $folder->id)}}">
        @method('PATCH')
        @csrf
        <div>
            <legend>
                <h2>Modifier un dossier</h2>
            </legend>
        </div>
        <div>
            <label>Nom</label>
            <input type="text" name="name" value="{{$folder->name}}" />
        </div>
        <div>
            <label>Slug</label>
            <input type="text" name="slug" value="{{$folder->slug}}" />
        </div>
        <div>
            <label>Accès</label>
            <input type="text" name="access" value="{{$folder->access}}" />
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>
@endsection