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
    <form method="post" action="{{route('folder.picture.update', [$folder->slug, $picture->slug])}}">
        @method('PATCH')
        @csrf
        <div>
            <legend>
                <h2>Modifier une photo</h2>
            </legend>
        </div>
        <div>
            <label>Nom :</label>
            <input type="text" name="name" value="{{old("name")?:$picture->link}}" />
        </div>
        <div>
            <label>Accès :</label>
            <input type="text" name="access" value="{{old("access")?:$picture->access}}" />
        </div>
        <div>
            <label>Lien :</label>
            <input type="text" name="link" value="{{old("link")?:$picture->link}}" />
        </div>
        <div>
            <label>Infos :</label>
            <input type="text" name="info" value="{{old("info")?:$picture->info}}" />
        </div>
        <div>
            <label>Texte Alternatif :</label>
            <input type="text" name="alternative" value="{{old("alternative")?:$picture->alternative}}" />
        </div>
        <div>
            <label>Tags :</label>
            <p>
                @foreach($allTags as $tag)
                    <span>{{$tag->name}},</span>
                @endforeach
            </p>
            <input type="text" name="tags" value="{{old("tags")?:$picture->tagsAsString}}" />

        </div>
        <div>
            <input type="submit" />
        </div>
    </form>
@endsection