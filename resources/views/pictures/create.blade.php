@extends ("layouts.layout")

@section("CSS")
    <link href="/css/style_welcome.css" rel="stylesheet" media="all">
@endsection

@section("content")
    @if ($errors->any())
        <ul>{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
    @endif
    <form method="post" action="{{route('picture.store')}}">
        @csrf
        <div>
            <legend>
                <h2>Ajouter une nouvelle photo</h2>
            </legend>
        </div>
        <div>
            <label>Folder Id</label>
            <input type="text" name="folder_id" value="{{old("folder_id")}}" />
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