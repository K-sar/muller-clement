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
                <h1>
                    CLEMENT MULLER
                </h1>
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
                            @if($xp->type == 'expérience')
                                <h3>{{$xp->title}}</h3>
                                <p>{{$xp->content}}</p>
                            @endif
                        </div>
                        <div class="year">
                            <h4>{{$xp->year}}</h4>
                        </div>
                        <div class="formation">
                            @if($xp->type == 'formation')
                                <h3>{{$xp->title}}</h3>
                                <p>{{$xp->content}}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
                <div class="xp-line last-line">
                    <div class="experience"></div><div class="year"></div><div class="formation"></div>
                </div>
            </div>
            <div id="xp-responsive">
                <div class="xp-line last-line">
                    <div class="year"></div><div class="experience"><h2>Expériences professionnelles</h2></div>
                </div>
                @foreach($xps as $xp)
                    @if($xp->type == 'expérience')
                        <div class="xp-line">
                            <div class="year">
                                <h4>{{$xp->year}}</h4>
                            </div>
                            <div class="experience">
                                <h3>{{$xp->title}}</h3>
                                <p>{{$xp->content}}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
                <div class="xp-line last-line">
                    <div class="year"></div><div class="experience"><h2>Formations</h2></div>
                </div>
                @foreach($xps as $xp)
                    @if($xp->type == 'formation')
                        <div class="xp-line">
                            <div class="year">
                                <h4>{{$xp->year}}</h4>
                            </div>
                            <div class="experience">
                                <h3>{{$xp->title}}</h3>
                                <p>{{$xp->content}}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
                <div class="xp-line last-line">
                    <div class="year"></div><div class="experience"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="footer-CV">
        <p>Plus d'information sur <a href="https://www.muller-clement.com">www.muller-clement.com</a></p>
    </div>
@endsection