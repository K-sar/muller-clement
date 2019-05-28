@extends ("layouts.layout")

@section("CSS")
    <link href="/css/style_welcome.css" rel="stylesheet" media="all">
@endsection

@section("nav")
    <a href="{{route('folder.show', $folder_id)}}">
        <h3>Retour</h3>
    </a>
@endsection

@section("content")
    @if ($errors->any())
        <ul>{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
    @endif
    <form method="post" action="{{route('folder.picture.store', $folder_id)}}">
        @csrf
        <div>
            <legend>
                <h2>Ajouter une nouvelle photo</h2>
            </legend>
        </div>
        <div>
            <input type="text" name="folder_id"  value="{{$folder_id}}"/>
        </div>
        <div>
            <label>Nom</label>
            <input type="text" name="name" value="{{old("name")}}" />
        </div>
        <div>
            <label>Accès</label>
            <input type="text" name="access" value="{{old("access")}}" />
        </div>
        <div>
            <label>Lien</label>
            <input type="text" name="link" value="{{old("link")}}" />
        </div>
        <div>
            <label>Infos</label>
            <input type="text" name="info" value="{{old("info")}}" />
        </div>
        <div>
            <label>Texte alternatif</label>
            <input type="text" name="alternative" value="{{old("alternative")}}" />
        </div>
        <div>
            <label>Slug</label>
            <input type="text" name="slug" value="{{old("slug")}}" />
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>
@endsection