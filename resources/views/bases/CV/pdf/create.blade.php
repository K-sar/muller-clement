@extends ("layouts.layout")

@section('title')
    <title>Clément Muller - CV - Ajouter une version PDF</title>
    <meta name="description" content="Formulaire d'ajout d'une nouvelle version PDF"/>
@endsection

@section("nav")
    <div><a href="{{route('CV.backoffice')}}"><h3><i class="fas fa-arrow-left"></i></h3></a></div>
@endsection

@section("content")
    @if ($errors->any())
        <ul>{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
    @endif
    <form method="post" action="{{route('pdf.store')}}" enctype="multipart/form-data">
        @csrf
        <div>
            <legend>
                <h2>Ajouter une nouvelle version PDF</h2>
            </legend>
        </div>
        <div>
            <label>Fichier :</label>
            <input type="file" name="file"/>
        </div>
        <div>
            <label>Langue :</label>
            <input type="text" name="lang" value="{{old("lang")}}" />
        </div>
        <div>
            <label>Date :</label>
            <input type="date" name="date" value="{{old("date")}}" />
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>
@endsection