@extends ("layouts.layout")

@section('title')
    <title>Clément Muller - Back-office du CV</title>
    <meta name="description" content="Back-office du CV"/>
@endsection

@section("content")
    <div class="flex column">
        <h2>Expériences :</h2>
            @foreach($xps as $xp)
                <div class="miniature CV">
                    <div class="button CV @if(!$xp->publish) bc-grey @endif">
                        <div class="flex">
                            <div class="experience">
                                @if($xp->exp_title)
                                    <h3>{!! $xp->exp_title !!}</h3>
                                    <p>{!! $xp->exp_details_1 !!}</p>
                                    @if($xp->_exp_details_2) <p>{!! $xp->exp_details_2 !!}</p> @endif
                                    <p class="italic">{!! $xp->exp_content !!}</p>
                                @endif
                            </div>
                            <div><p>{{$xp->year}}</p></div>
                            <div class="formation">
                                @if($xp->for_title)
                                    <h3>{!! $xp->for_title !!}</h3>
                                    <p>{!! $xp->for_details_1 !!}</p>
                                    @if($xp->for_details_2) <p>{!! $xp->for_details_2 !!}</p> @endif
                                    <p class="italic">{!! $xp->for_content !!}</p>
                                @endif
                            </div>
                        </div>
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
        <a href="{{route('xp.create')}}"><button><i class="fas fa-plus"></i></button></a>
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