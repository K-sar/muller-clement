@extends ("layouts.layout")

@section('title')
    <title>Clément Muller - CV - Modifier une version PDF</title>
    <meta name="description" content="Formulaire de modification d'une version PDF"/>
@endsection

@section("nav")
    <div><a href="{{route('CV.backoffice')}}"><h3><i class="fas fa-arrow-left"></i></h3></a></div>
@endsection

@section("content")
    @if ($errors->any())
        <ul>{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
    @endif
    <form method="post" action="{{route('pdf.update', [$pdf->id])}}" enctype="multipart/form-data">
        @csrf
        <div>
            <legend>
                <h2>Modifier une version PDF</h2>
            </legend>
        </div>
        <div>
            <label>Langue :</label>
            <input type="text" name="lang" value="{{old("lang")?:$pdf->lang}}" />
        </div>
        <div>
            <label>Date :</label>
            <input type="date" name="date" value="{{old("date")?:$pdf->date}}" />
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>
@endsection