@extends ("layouts.layout")

@section('title')
    <title>Clément Muller - CV - Modifier une expérience</title>
    <meta name="description" content="Formulaire de modification d'une expérience"/>
@endsection

@section("nav")
    <div><a href="{{route('CV.backoffice')}}"><h3><i class="fas fa-arrow-left"></i></h3></a></div>
@endsection

@section("content")
    @if ($errors->any())
        <ul>{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
    @endif
    <form method="post" action="{{route('xp.update', $xp->id)}}" enctype="multipart/form-data">
        @csrf
        <div>
            <legend>
                <h2>Modifier une expérience</h2>
            </legend>
        </div>
        <div class="flex">
            <div class="wd-125 mg-l-0 mg-r-20">
                <label for="year">Année :</label>
                <input type="text" name="year" value="{{old("year")?:$xp->year}}" />
            </div>
            <div class="wd-125 mg-l-0 mg-r-20">
                <label for="publish">Public </label>
                <input type="checkbox" name="publish" value="1" @if (old("publish")||(!old()&&$xp->publish)) checked @endif class="wd-15 mg-l-0"/>
            </div>
        </div>
        <div>
            <legend>
                <h3>Expérience professionnelle</h3>
            </legend>
        </div>
        <div>
            <label for="title">Titre :</label>
            <input type="text" name="exp_title" value="{{old("exp_title")?:$xp->exp_title}}" />
        </div>
        <div>
            <label for="details_1">Détails 1 :</label>
            <textarea name="exp_details_1">{{old("exp_details_1")?:$xp->exp_details_1}}</textarea>
        </div>
        <div>
            <label for="details_2">Détails 2 :</label>
            <textarea name="exp_details_2">{{old("exp_details_2")?:$xp->exp_details_2}}</textarea>
        </div>
        <div>
            <label for="content">Description :</label>
            <textarea name="exp_content">{{old("exp_content")?:$xp->exp_content}}</textarea>
        </div>
        <div>
            <label for="link">Lien :</label>
            <input type="text" name="exp_link" value="{{old("exp_link")?:$xp->exp_link}}" />
        </div>
        <div>
            <legend>
                <h3>Formation</h3>
            </legend>
        </div>
        <div>
            <label for="title">Titre :</label>
            <input type="text" name="for_title" value="{{old("for_title")?:$xp->for_title}}" />
        </div>
        <div>
            <label for="details_1">Détails 1 :</label>
            <textarea name="for_details_1">{{old("for_details_1")?:$xp->for_details_1}}</textarea>
        </div>
        <div>
            <label for="details_2">Détails 2 :</label>
            <textarea name="for_details_2">{{old("for_details_2")?:$xp->for_details_2}}</textarea>
        </div>
        <div>
            <label for="content">Description :</label>
            <textarea name="for_content">{{old("for_content")?:$xp->for_content}}</textarea>
        </div>
        <div>
            <label for="link">Lien :</label>
            <input type="text" name="for_link" value="{{old("for_link")?:$xp->for_link}}" />
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>
@endsection