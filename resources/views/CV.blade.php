@extends ("layouts.layout")

@section('title')
    <title>Clément Muller - CV</title>
    <meta name="description" content="Mon CV, dernière mise à jour en aout 2019"/>
@endsection

@section("content")
    <embed src='/storage/CV/CV.pdf' type='application/pdf'/>
@endsection