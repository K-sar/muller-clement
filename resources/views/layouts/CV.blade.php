@extends ("layouts.layout")

@section('title')
    <title>Clément Muller - CV</title>
    <meta name="description" content="Mon CV, dernière mise à jour en aout 2019"/>
@endsection

@section("nav")
    @can('admin', App\Base::class)
        <div><a href="{{route('CV.backoffice')}}"><h3>Back-Office</h3></a></div>
    @endcan
@endsection

@if($pdf)
    @section('nav-ext')
        <div><a href="/storage/CV/{{$pdf->link}}"><h3 id="PDF">Version PDF</h3></a></div>
    @endsection
@endif

@section("content")
    <div id="CV">
        <div id="column-large">
            @yield('column')
        </div>
        <div id="resume">
            <div id="header-CV">
                <div>
                    <div></div>
                    <h1>
                        CLEMENT MULLER
                    </h1>
                    <div></div>
                </div>
            </div>
            <div id="column-responsive">
                @yield('column')
            </div>
            <div id="xp">
                <div class="xp-line last-line">
                    <div class="experience"></div><div class="year"></div><div class="formation"></div>
                </div>
                @foreach($xps as $xp)
                    <div class="xp-line">
                        <div class="experience">
                            @if($xp->exp_title)
                                <h3>{!! $xp->exp_title !!}</h3>
                                <p>{!! $xp->exp_details_1 !!}</p>
                                @if($xp->exp_details_2) <p>{!! $xp->exp_details_2 !!}</p> @endif
                                <p class="italic">{!! $xp->exp_content !!}</p>
                            @endif
                        </div>
                        <div class="year relative">
                            @if($backoffice)
                                <div class="menu-auth auth-CV">
                                    <a href="{{route('xp.edit', $xp->id)}}"><button><i class="far fa-edit"></i></button></a>
                                    <form action="{{route('xp.delete', $xp->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            @endif
                            <div class="arrow @if($xp->exp_title)left-arrow @else empty-arrow @endif"></div>
                            <h4>{{$xp->year}}</h4>
                            <div class="arrow @if($xp->for_title)right-arrow @else empty-arrow @endif"></div>
                        </div>
                        <div class="formation">
                            @if($xp->for_title)
                                <h3>{!! $xp->for_title !!}</h3>
                                <p>{!! $xp->for_details_1 !!}</p>
                                @if($xp->for_details_2) <p>{!! $xp->for_details_2 !!}</p> @endif
                                <p class="italic">{!! $xp->for_content !!}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
                <div class="xp-line last-line">
                    <div class="experience"></div>
                    <div class="year relative">
                        @if($backoffice)
                            <div class="menu-auth auth-CV">
                                <a href="{{route('xp.create')}}"><button><i class="fas fa-plus"></i></button></a>
                            </div>
                        @endif
                    </div>
                    <div class="formation"></div>
                </div>
            </div>
            <div id="xp-responsive">
                <div class="xp-line xp-sign">
                    <h2>Expériences professionnelles</h2>
                </div>
                @foreach($xps as $xp)
                    @if($xp->exp_title)
                        <div class="xp-line">
                            <div class="year relative">
                                @if($backoffice)
                                    <div class="menu-auth auth-CV">
                                        <a href="{{route('xp.edit', $xp->id)}}"><button><i class="far fa-edit"></i></button></a>
                                        <form action="{{route('xp.delete', $xp->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"><i class="far fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                @endif
                                <div class="arrow empty-arrow"></div>
                                <h4>{{$xp->year}}</h4>
                                <div class="arrow right-arrow"></div>
                            </div>
                            <div class="experience">
                                <h3>{!! $xp->exp_title !!}</h3>
                                <p>{!! $xp->exp_details_1 !!}</p>
                                @if($xp->exp_details_2) <p>{!! $xp->exp_details_2 !!}</p> @endif
                                <p class="italic">{!! $xp->exp_content !!}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
                <div class="xp-line xp-sign">
                    <h2>Formations</h2>
                </div>
                @foreach($xps as $xp)
                    @if($xp->for_title)
                        <div class="xp-line">
                            <div class="year relative">
                                @if($backoffice)
                                    <div class="menu-auth auth-CV">
                                        <a href="{{route('xp.edit', $xp->id)}}"><button><i class="far fa-edit"></i></button></a>
                                        <form action="{{route('xp.delete', $xp->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"><i class="far fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                @endif
                                <div class="arrow empty-arrow"></div>
                                <h4>{{$xp->year}}</h4>
                                <div class="arrow right-arrow"></div>
                            </div>
                            <div class="experience">
                                <h3>{!! $xp->for_title !!}</h3>
                                <p>{!! $xp->for_details_1 !!}</p>
                                @if($xp->for_details_2) <p>{!! $xp->for_details_2 !!}</p> @endif
                                <p class="italic">{!! $xp->for_content !!}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
                <div class="xp-line last-line ">
                    <div class="year relative">
                        @if($backoffice)
                            <div class="menu-auth auth-CV">
                                <a href="{{route('xp.create')}}"><button><i class="fas fa-plus"></i></button></a>
                            </div>
                        @endif
                    </div>
                    <div class="experience"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="footer-CV">
        <p>Plus d'information sur <a href="https://www.muller-clement.com">www.muller-clement.com</a></p>
    </div>
    @if($backoffice)
        <div class="center column mg-b-25">
            <h2>Versions PDF :</h2>
            <div>
                @foreach($pdfs as $pdf)
                    <div class="flex">
                        <a href="{{'/storage/CV/'.$pdf->link}}" class="link">{{$pdf->link}}</a>
                        <a href="{{route('pdf.edit', $pdf->id)}}"><button><i class="far fa-edit"></i></button></a>
                        <form action="{{route('pdf.delete', $pdf->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </div>
                @endforeach
            </div>
            <a href="{{route('pdf.create')}}"><button><i class="fas fa-plus"></i></button></a>
        </div>
    @endif
@endsection