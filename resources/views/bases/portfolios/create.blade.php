@extends ("layouts.layout")

@section('title')
    <title>Clément Muller - Portfolio - Ajouter un projet</title>
    <meta name="description" content="Formulaire d'ajout d'un nouveau projet"/>
@endsection

@section("content")
    @if ($errors->any())
        <ul>{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
    @endif
    <form method="post" action="{{route('portfolio.store')}}" enctype="multipart/form-data">
        @csrf
        <div>
            <legend>
                <h2>Ajouter une nouvelle entrée</h2>
            </legend>
        </div>
        <div>
            <label>Nom</label>
            <input type="text" name="name" value="{{old("name")}}" />
        </div>
        <div>
            <label>Descriptif</label>
            <textarea type="text" name="description">{{old("description")}}</textarea>
        </div>
        <div>
            <label>Lien</label>
            <input type="text" name="link" value="{{old("link")}}" />
        </div>
        <div>
            <label>Miniature :</label>
            <input type="file" name="file"/>
        </div>
        <div>
            <input type="submit" value="Ajouter" />
        </div>
    </form>
@endsection