@extends ("layouts.layout")

@section("content")
    <div class="flex">
        <div>
            <h3>Expériences :</h3>
            @foreach($xps as $xp)
                <p>{{$xp->title}}</p>
                <p>{{$xp->content}}</p>
                <p>{{$xp->from}}</p>
                <p>{{$xp->to}}</p>
                <a>{{$xp->link}}</a>
                <a href="{{route('Xp.edit', $xp->id)}}"><button>Modifier</button></a>
                <form action="{{route('Xp.delete', $xp->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            @endforeach
        </div>
        <div>
            <h3>Formations :</h3>
            @foreach($formations as $formation)
                <p>{{$formation->title}}</p>
                <p>{{$formation->content}}</p>
                <p>{{$formation->from}}</p>
                <p>{{$formation->to}}</p>
                <a>{{$formation->link}}</a>
                <a href="{{route('formation.edit', $formation->id)}}"><button>Modifier</button></a>
                <form action="{{route('formation.delete', $formation->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            @endforeach
        </div>
    </div>
    <div>
        <h3>Versions PDF :</h3>
        @foreach($PDFs as $PDF)
            <div class="flex">
                <a href="{{'/storage/CV/'.$PDF->link}}">{{$PDF->link}}</a>
                <a href="{{route('pdf.edit', $PDF->id)}}"><button><i class="far fa-edit"></i></button></a>
                <form action="{{route('pdf.delete', $PDF->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit"><i class="far fa-trash-alt"></i></button>
                </form>
            </div>
        @endforeach
        <a href="{{route('pdf.create')}}"><button>Ajouter</button></a>
    </div>
@endsection