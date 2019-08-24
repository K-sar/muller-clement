@extends ("layouts.layout")

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
            <input type="text" name="description" value="{{old("description")}}" />
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
            <input type="submit" />
        </div>
    </form>
@endsection