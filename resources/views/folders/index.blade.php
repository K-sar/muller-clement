@extends ("layouts.layout")

@section("content")

<h2>La Galerie Photo</h2>

@can('admin', App\Folder::class)
    <a href="{{route('folder.create')}}"><button>Ajouter un dossier</button></a>
@endcan
<a href="{{route('picture.index')}}">Toutes les photos</a>
<div id="menu">
    @foreach ($folders as $folder)
        @can('show', $folder)
            <div class="miniature">
                <a href="{{route('folder.show', $folder->slug)}}">
                    <div class="button">
                        <div class="fond">
                            <h1>{{$folder->name}}</h1>
                        </div>
                        <h2>
                            {{$folder->name}}
                        </h2>
                    </div>
                </a>
                @can('admin', $folder)
                    <div class="menu-auth">
                        <a href="{{route('folder.edit', $folder->slug)}}"><button>Modifier</button></a>
                        <form action="{{route('folder.destroy', $folder->slug)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </div>
                @endcan
            </div>
        @endcan
    @endforeach
</div>
@endsection