@extends ("layouts.layout")

@section('title')
    <title>Clément Muller - Accueil - Modifier l'entrée {{$base->name}}</title>
    <meta name="description" content="Formulaire pour modifier l'entrée {{$base->name}}"/>
@endsection

@section("content")
    @if ($errors->any())
        <ul>{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
    @endif
    <form method="post" action="{{route('base.update', $base->id)}}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div>
            <legend>
                <h2>Modifier une entrée</h2>
            </legend>
        </div>
        <div>
            <label>Nom</label>
            <input type="text" name="name" value="{{old("name")?:$base->name}}" />
        </div>
        <div>
            <label>Descriptif</label>
            <textarea name="description">{{old("description")?:$base->description}}</textarea>
        </div>
        <div>
            <label>Route</label>
            <input type="text" name="link" value="{{old("link")?:$base->link}}" />
        </div>
        <div>
            <label>Ordre :</label>
            <input type="text" name="ordre" value="{{old("ordre")?:$base->ordre}}" />
        </div>
        <div>
            <label>Miniature :</label>
            <input type="file" name="file"/>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>
@endsection