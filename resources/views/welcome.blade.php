@extends ("layouts.layout")

@section("content")
    <body>
        <!--<div id="construction">
            <img src="images/site-en-construction.jpg" alt="site en construction" />
        </div>construction-->
        <div id="menu">
            <div class="miniature">
                <a href="CV">
                    <div class="button">
                        <div class="fond">
                            <h1>CV</h1>
                        </div>
                        <h2>
                            CV
                        </h2>
                    </div>
                </a>
            </div>
            <div class="miniature">
                <a href="/portfolio">
                    <div class="button">
                        <div class="fond">
                            <h1>Portfolio</h1>
                        </div>
                        <h2>
                            Portfolio
                        </h2>
                    </div>
                </a>
            </div>
            <div class="miniature">
                <a href="{{route("folder.index")}}">
                    <div class="button">
                        <div class="fond">
                            <h1>Galerie</h1>
                        </div>
                        <h2>
                            La Galerie
                        </h2>
                    </div>
                </a>
            </div>
        </div><!--menu-->
    </body>
@endsection