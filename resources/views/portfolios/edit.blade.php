@extends ("layouts.layout")

@section('title')
    <title>Clément Muller - Portfolio - Modifier le projet {{$portfolio->name}}</title>
    <meta name="description" content="Formulaire de modification du projet {{$portfolio->name}}"/>
@endsection

@section("content")
    @if ($errors->any())
        <ul>{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
    @endif
    <div class="miniPortfolio">
        <img src="/storage/miniatures/portfolio/{{$portfolio->picture}}" alt="miniature {{$portfolio->name}}" class="imgPortfolio"/>
    </div>
    <form method="post" action="{{route('portfolio.update', $portfolio->slug)}} "enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div>
            <legend>
                <h2>Modifier un projet</h2>
            </legend>
        </div>
        <div>
            <label>Nom</label>
            <input type="text" name="name" value="{{old("name")?:$portfolio->name}}" />
        </div>
        <div>
            <label>Descriptif</label>
            <textarea name="description">{{old("description")?:$portfolio->description}}</textarea>
        </div>
        <div>
            <label>Lien</label>
            <input type="text" name="link" value="{{old("link")?:$portfolio->link}}" />
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