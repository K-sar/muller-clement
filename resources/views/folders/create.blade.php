@extends ("layouts.layout")

@section("CSS")
    <link href="/css/style_welcome.css" rel="stylesheet" media="all">
@endsection

@section("nav")
    <a href="{{route('folder.show')}}">
        <h3>Retour</h3>
    </a>
@endsection

@section("content")
    @if ($errors->any())
        <ul>{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
    @endif
    <form method="post" action="{{route('folder.store')}}">
        @csrf
        <div>
            <legend>
                <h2>Ajouter un nouveau dossier</h2>
            </legend>
        </div>
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
        <div>
            <input type="submit" />
        </div>
    </form>
@endsection