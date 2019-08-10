@extends ("layouts.layout")

@section("content")
    @if ($errors->any())
        <ul>{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
    @endif
    <form method="post" action="{{route('base.store')}}" enctype="multipart/form-data">
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
            <label>Route</label>
            <input type="text" name="link" value="{{old("route")}}" />
        </div>
        <div>
            <label>Ordre :</label>
            <input type="text" name="ordre" value="{{old("ordre")}}" />
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