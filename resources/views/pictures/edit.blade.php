@extends ("layouts.layout")

@section("CSS")
    <link href="css/style_pictures.css" rel="stylesheet" media="all">
@endsection

@section("content")
    @if ($errors->any())
        <ul>{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
    @endif
    <form method="post" action="{{route('picture.update', $picture->id)}}">
        @csrf
        <div>
            <label>Folder Id</label>
            <input type="text" name="folder_id" value="{{$picture->folder_id}}" />
        </div>
        <div>
            <label>Accès</label>
            <input type="text" name="access" value="{{$picture->access}}" />
        </div>
        <div>
            <label>Lien</label>
            <input type="text" name="link" value="{{$picture->link}}" />
        </div>
        <div>
            <label>Infos</label>
            <input type="text" name="info" value="{{$picture->info}}" />
        </div>
        <div>
            <label>Texte Alternatif</label>
            <input type="text" name="alternative" value="{{$picture->alternative}}" />
        </div>
        <div>
            <label>Slug</label>
            <input type="text" name="slug" value="{{$picture->slug}}" />
        </div>
        <input type="submit" />
    </form>
@endsection