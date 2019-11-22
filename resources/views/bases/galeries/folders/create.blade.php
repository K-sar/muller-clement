@extends ("layouts.layout")

@section('title')
    <title>Clément Muller - Galerie - Ajouter un dossier</title>
    <meta name="description" content="Formulaire pour ajouter un nouveau dossier à la galerie"/>
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
            <label>Accès</label>
            <input type="text" name="access" value="{{old("access")}}" />
        </div>
        <div>
            <label>Ordre :</label>
            <input type="text" name="ordre" value="{{old("ordre")}}" />
        </div>
        <div>
            <input type="submit" value="Ajouter" />
        </div>
    </form>
@endsection