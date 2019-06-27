@extends ("layouts.layout")

@section("CSS")
    <link href="/css/style_welcome.css" rel="stylesheet" media="all">
@endsection

@section("nav")
    <a href="{{route('folder.show', $folder->slug)}}">
        <h3>Retour</h3>
    </a>
@endsection

@section("content")
    @if ($errors->any())
        <ul>{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
    @endif
    <form method="post" action="{{route('folder.picture.store', $folder->slug)}}">
        @csrf
        <div>
            <legend>
                <h2>Ajouter une nouvelle photo</h2>
            </legend>
        </div>
        <div>
            <label>Nom :</label>
            <input type="text" name="name" value="{{old("name")}}" />
        </div>
        <div>
            <label>Accès :</label>
            <input type="text" name="access" value="{{old("access")}}" />
        </div>
        <div>
            <label>Lien :</label>
            <input type="text" name="link" value="{{old("link")}}" />
        </div>
        <div>
            <label>Infos :</label>
            <input type="text" name="info" value="{{old("info")}}" />
        </div>
        <div>
            <label>Texte alternatif :</label>
            <input type="text" name="alternative" value="{{old("alternative")}}" />
        </div>
        <div>
            <label>Tag :</label>
            <p>
                @foreach($allTags as $tag)
                    <span>{{$tag->name}},</span>
                @endforeach
            </p>
            <input type="text" name="tags" value="{{old("tags")}}" />
        </div>
        <p>
            @foreach($allTags as $tag)
                <span>{{$tag->name}}</span>
            @endforeach
        </p>
        <div>
            <input type="submit" />
        </div>
    </form>
@endsection