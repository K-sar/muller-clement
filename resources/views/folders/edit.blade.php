@extends ("layouts.layout")

@section("content")
    @if ($errors->any())
        <ul>{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
    @endif
    <form method="post" action="{{route('folder.update', $folder->slug)}}">
        @method('PATCH')
        @csrf
        <div>
            <legend>
                <h2>Modifier un dossier</h2>
            </legend>
        </div>
        <div>
            <label>Nom</label>
            <input type="text" name="name" value="{{old("name")?:$folder->name}}" />
        </div>
        <div>
            <label>Accès</label>
            <input type="text" name="access" value="{{old("access")?:$folder->access}}" />
        </div>
        <div>
            <label>Ordre :</label>
            <input type="text" name="ordre" value="{{old("ordre")?:$folder->ordre}}" />
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>
@endsection