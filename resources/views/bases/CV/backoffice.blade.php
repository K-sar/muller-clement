@extends ("layouts.layout")

@section('title')
    <title>Clément Muller - Back-office du CV</title>
    <meta name="description" content="Back-office du CV"/>
@endsection

@section("content")
    <div class="flex space-around">
        <div class="center column">
            <h2>Expériences :</h2>
            @foreach($xps as $xp)
                <div class="miniature CV">
                    <div class="button relative">
                        <h3>{{$xp->title}}</h3>
                        <p class="mg-5">{{$xp->content}}</p>
                        <p class="mg-5">De : {{$xp->from}} à {{$xp->to}}</p>
                        <a href="{{$xp->link}}" class="mg-5 link">{{$xp->link}}</a>
                        <div class="flex mg-5">
                            <a href="{{route('xp.edit', $xp->id)}}"><button><i class="far fa-edit"></i></button></a>
                            <form action="{{route('xp.delete', $xp->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            <a href="{{route('xp.create', 'expérience')}}"><button><i class="fas fa-plus"></i></button></a>
        </div>
        <div class="center column">
            <h2>Formations :</h2>
            @foreach($formations as $formation)
                <div class="miniature CV">
                    <div class="button relative">
                        <h3>{{$formation->title}}</h3>
                        <p class="mg-5">{{$formation->content}}</p>
                        <p class="mg-5">De : {{$formation->from}} à {{$formation->to}}</p>
                        <a href="{{$formation->link}}" class="mg-5 link">{{$formation->link}}</a>
                        <div class="flex mg-5">
                            <a href="{{route('xp.edit', $formation->id)}}"><button><i class="far fa-edit"></i></button></a>
                            <form action="{{route('xp.delete', $formation->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
                <a href="{{route('xp.create', 'formation')}}"><button><i class="fas fa-plus"></i></button></a>
        </div>
    </div>
    <div class="center column">
        <h2>Versions PDF :</h2>
        <div>
            @foreach($PDFs as $PDF)
                <div class="flex">
                    <a href="{{'/storage/CV/'.$PDF->link}}" class="link">{{$PDF->link}}</a>
                    <a href="{{route('pdf.edit', $PDF->id)}}"><button><i class="far fa-edit"></i></button></a>
                    <form action="{{route('pdf.delete', $PDF->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><i class="far fa-trash-alt"></i></button>
                    </form>
                </div>
            @endforeach
        </div>
        <a href="{{route('pdf.create')}}"><button><i class="fas fa-plus"></i></button></a>
    </div>
@endsection