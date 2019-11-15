@extends ("layouts.layout")

@section('title')
    <title>Clément Muller - CV - Ajouter une expérience</title>
    <meta name="description" content="Formulaire d'ajout d'une nouvelle expérience"/>
@endsection

@section("nav")
    <div><a href="{{route('CV.backoffice')}}"><h3><i class="fas fa-arrow-left"></i></h3></a></div>
@endsection

@section("content")
    @if ($errors->any())
        <ul>{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
    @endif
    <form method="post" action="{{route('xp.store')}}" enctype="multipart/form-data">
        @csrf
        <div>
            <legend>
                <h2>Ajouter une nouvelle expérience</h2>
            </legend>
        </div>
        <div class="flex">
            <div class="wd-125 mg-l-0 mg-r-20">
                <label for="year">Année :</label>
                <input type="text" name="year" value="{{old("year")}}" />
            </div>
            <div class="wd-125 mg-l-0 mg-r-20">
                <label for="publish">Public </label>
                <input type="checkbox" name="publish" value="1" @if (old("publish")) checked @endif class="wd-15 mg-l-0"/>
            </div>
        </div>
        <div>
            <legend>
                <h3>Expérience professionnelle</h3>
            </legend>
        </div>
        <div>
            <label>Titre :</label>
            <input type="text" name="exp_title" value="{{old("exp_title")}}" />
        </div>
        <div>
            <label>Détails 1 :</label>
            <textarea name="exp_details_1">{{old("exp_details_1")}}</textarea>
        </div>
        <div>
            <label>Détails 2 :</label>
            <textarea name="exp_details_2">{{old("exp_details_2")}}</textarea>
        </div>
        <div>
            <label>Description :</label>
            <textarea name="exp_content">{{old("exp_content")}}</textarea>
        </div>
        <div>
            <label>Lien :</label>
            <input type="text" name="exp_link" value="{{old("exp_link")}}" />
        </div>
        <div>
            <legend>
                <h3>Formation</h3>
            </legend>
        </div>
        <div>
            <label>Titre :</label>
            <input type="text" name="for_title" value="{{old("for_title")}}" />
        </div>
        <div>
            <label>Détails 1 :</label>
            <textarea name="for_details_1">{{old("for_details_1")}}</textarea>
        </div>
        <div>
            <label>Détails 2 :</label>
            <textarea name="for_details_2">{{old("for_details_2")}}</textarea>
        </div>
        <div>
            <label>Description :</label>
            <textarea name="for_content">{{old("for_content")}}</textarea>
        </div>
        <div>
            <label>Lien :</label>
            <input type="text" name="for_link" value="{{old("for_link")}}" />
        </div>
        <div>
            <input type="submit" class="mg-5"/>
        </div>
    </form>
@endsection