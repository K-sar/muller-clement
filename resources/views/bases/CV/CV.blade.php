@extends ("layouts.layout")

@section ("CSS")
    <link href="{{ mix('/css/CV.css') }}" rel="stylesheet" media="all">
@endsection

@section('title')
    <title>Clément Muller - CV</title>
    <meta name="description" content="Mon CV, dernière mise à jour en aout 2019"/>
@endsection

@section("nav")
    <div><a href="{{route("pdf.show")}}"><h3>Version PDF</h3></a></div>
    @can('admin', App\Base::class)
        <div><a href="{{route('CV.backoffice')}}"><h3>Back-Office</h3></a></div>
    @endcan
@endsection

@section("content")

@endsection