@extends ("layouts.layout")

@section('title')
    <title>Clément Muller - CV - Ajouter une {{old("type")?:$type}}</title>
    <meta name="description" content="Formulaire d'ajout d'une nouvelle {{old("type")?:$type}}"/>
@endsection

@section("nav")
    <div><a href="{{route('CV.backoffice')}}"><h3><i class="fas fa-arrow-left"></i></h3></a></div>
@endsection

@section("content")
    @if ($errors->any())
        <ul>{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
    @endif
    <form method="post" action="{{route('xp.store')}}" enctype="multipart/form-data">
        @csrf
        <div>
            <legend>
                <h2>Ajouter une nouvelle {{old("type")?:$type}}</h2>
            </legend>
        </div>
        <div>
            <label>Type :</label>
            <select name="type">
                <option @if (old("type") == "expérience"||(!old("type")&&$type=='expérience')) selected @endif value="expérience">Expérience</option>
                <option @if (old("type") == "formation"||(!old("type")&&$type=='formation')) selected @endif value="formation">Formation</option>
            </select>
        </div>
        <div>
            <label>Titre :</label>
            <input type="text" name="title" value="{{old("title")}}" />
        </div>
        <div>
            <label>Description :</label>
            <input type="text" name="content" value="{{old("content")}}" />
        </div>
        <div>
            <label>De :</label>
            <input type="text" name="from" value="{{old("from")}}" />
        </div>
        <div>
            <label>A :</label>
            <input type="text" name="to" value="{{old("to")}}" />
        </div>
        <div>
            <label>Lien :</label>
            <input type="text" name="link" value="{{old("link")}}" />
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>
@endsection