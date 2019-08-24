@extends ("layouts.layout")

@section("content")
    @if ($errors->any())
        <ul>{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
    @endif
    <div class="miniature">
        <img src="/storage/miniatures/portfolio/{{$portfolio->picture}}" alt="miniature {{$portfolio->name}}"/>
    </div>
    <form method="post" action="{{route('portfolio.update', $portfolio->slug)}} "enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div>
            <legend>
                <h2>Modifier une entrée</h2>
            </legend>
        </div>
        <div>
            <label>Nom</label>
            <input type="text" name="name" value="{{old("name")?:$portfolio->name}}" />
        </div>
        <div>
            <label>Descriptif</label>
            <input type="text" name="description" value="{{old("description")?:$portfolio->description}}" />
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