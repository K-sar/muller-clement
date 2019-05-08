@extends ("layouts.layout")
@section("content")
    Bonjour pictures
    @foreach ($pictures as $picture)
        {{$picture->info}}
    @endforeach
@endsection