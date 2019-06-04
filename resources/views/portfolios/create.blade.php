@extends ("layouts.layout")

@section("CSS")
    <link href="/css/style_welcome.css" rel="stylesheet" media="all">
@endsection

@section("content")
    @if ($errors->any())
        <ul>{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
    @endif
    <form method="post" action="{{route('portfolio.store')}}">
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
            <label>Miniature</label>
            <input type="text" name="picture" value="{{old("picture")}}" />
        </div>
        <div>
            <label>Lien</label>
            <input type="text" name="link" value="{{old("link")}}" />
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>
@endsection