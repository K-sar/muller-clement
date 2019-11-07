@extends ("layouts.layout")

@section('title')
    <title>Clément Muller - Accueil</title>
    <meta name="description" content="Mon site, avec mon CV, mon portfolio et mes photos"/>
@endsection

@section("content")
    <div id="menu" class="relative">
        @can('admin', App\Base::class)
            <div class="menu-auth">
                <p>
                    <a href="{{route('base.create')}}"><button><i class="fas fa-folder-plus"></i></button></a>
                </p>
            </div>
        @endcan
        @foreach ($bases as $base)
            <div class="miniature relative">
                @can('admin', $base)
                    <div class="menu-auth">
                        <a href="{{route('base.edit', $base->id)}}"><button><i class="far fa-edit"></i></button></a>
                        <form action="{{route('base.destroy', $base->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </div>
                @endcan
                <a href="{{route($base->link)}}">
                    <div class="button">

                        <div class="fond descriptionFond">
                            <img src="/storage/miniatures/base/{{$base->miniature}}" alt="miniature de {{$base->name}}"/>
                            <figure class="description"><p>{{$base->description}}</p></figure>
                        </div>
                        <h2>
                            {{$base->name}}
                        </h2>
                    </div>
                </a>
            </div>
        @endforeach
    </div><!--menu-->
@endsection