@extends ("layouts.layout")

@section('title')
    <title>Clément Muller - Galerie - Ajouter une photo depuis le FTP</title>
    <meta name="description" content="Formulaire d'ajout d'une nouvelle photo depuis le FTP"/>
@endsection

@section("nav")
    <div><a href="{{route('FTP')}}"><h3><i class="fas fa-arrow-left"></i></h3></a></div>
@endsection

@section("content")
    @if ($errors->any())
        <ul>{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
    @endif
    <div class="containerImage">
        <img id="image" src='/storage/pictures/{{$FTP}}' alt='bug' class="pictures"/>
    </div>
    <form method="post" action="{{route('FTPStore', [$FTP])}}" enctype="multipart/form-data">
        @csrf
        <div>
            <legend>
                <h2>Ajouter une photo depuis le FTP</h2>
            </legend>
        </div>
        <div>
            <label>Dossier :</label>
            <select name="folder_id">
                @foreach ($allFolders as $allFolder)
                    <option @if (old("folder_id")==$allFolder->id) selected @endif value="{{$allFolder->id}}">{{$allFolder->name}}</option>
                @endforeach
            </select>
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