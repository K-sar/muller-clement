@extends ("layouts.layout")

@section("nav")
    <a href="{{route('folder.show', $folder->slug)}}">
        <h3>Retour</h3>
    </a>
@endsection

@section("content")
    @if ($errors->any())
        <ul>{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
    @endif
    <form method="post" action="{{route('folder.picture.store', $folder->slug)}}" enctype="multipart/form-data">
        @csrf
        <div>
            <legend>
                <h2>Ajouter une nouvelle photo</h2>
            </legend>
        </div>
        <div>
            <label>Fichier :</label>
            <input type="file" name="file"/>
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
            <label>Infos :</label>
            <input type="text" name="info" value="{{old("info")}}" />
        </div>
        <div>
            <label>Texte alternatif :</label>
            <input type="text" name="alternative" value="{{old("alternative")}}" />
        </div>
        <div>
            <label>Ordre :</label>
            <input type="text" name="ordre" value="{{old("ordre")}}" />
        </div>
        <div>
            <label>Slider :</label>
            <input type="text" name="slider" value="{{old("slider")}}" />
        </div>
        <div>
            <label>Tags :</label>
            <p>
                @foreach($allTags as $tag)
                    <button class="clicTag" data-value="{{$tag->name}}">{{$tag->name}}</button>
                @endforeach
            </p>
            <input id="inputTag" type="text" name="tags" value="{{old("tags")}}" />
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>
@endsection