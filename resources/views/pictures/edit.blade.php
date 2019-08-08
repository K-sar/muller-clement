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
    <img src='/storage/pictures/{{$picture->link}}' alt='{{$picture->alternative}}' class="pictures"/>
    <form method="post" action="{{route('folder.picture.update', [$folder->slug, $picture->slug])}} "enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div>
            <legend>
                <h2>Modifier une photo</h2>
            </legend>
        </div>
        <div>
            <label>Fichier :</label>
            <input type="file" name="file"/>
        </div>
        <div>
            <label>Nom :</label>
            <input type="text" name="name" value="{{old("name")?:$picture->name}}" />
        </div>
        <div>
            <label>Accès :</label>
            <input type="text" name="access" value="{{old("access")?:$picture->access}}" />
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
            <label>Ordre :</label>
            <input type="text" name="ordre" value="{{old("ordre")?:$picture->ordre}}" />
        </div>
        <div>
            <label>Slider :</label>
            <input type="text" name="slider" value="{{old("slider")?:$picture->slider}}" />
        </div>
        <div>
            <label>Tags :</label>
            <p>
                @foreach($allTags as $tag)
                    <button class="clicTag" data-value="{{$tag->name}}">{{$tag->name}}</button>
                @endforeach
            </p>
            <input id="inputTag" type="text" name="tags" value="{{old("tags")?:$picture->tagsAsString}}" />

        </div>
        <div>
            <input type="submit" />
        </div>
    </form>
@endsection