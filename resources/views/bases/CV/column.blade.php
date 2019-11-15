@extends ("layouts.CV")

@section ("CSS")
    <link href="{{ mix('/css/CV.css') }}" rel="stylesheet" media="all">
@endsection

@section('column')
    <div id="column-container">
        <div id="column">
            <div class="half-column">
                <div id="first-column-content" class="column-content quarter-column">
                        <div id="Photo-CV">
                            <a href="/storage/CV/Photo-CV.jpg">
                                <img src="/storage/CV/Photo-CV.jpg" alt="Photo de mon CV">
                            </a>
                        </div>
                    <span class="flex space-between wd-255"><p>29 ans</p><p>+33 6 76 71 06 30</p></span>
                    <p>
                        <a href="mailto:contact@muller-clement.com">contact@muller-clement.com</a>
                    </p>
                        <p>Nationalité suisse & française</p>
                </div>
                <div class="column-title">
                    <h2>Profil</h2>
                </div>
                <div class="column-content">
                    <p>
                        La découverte a longtemps
                        été un moteur pour moi, je
                        n’ai cessé d’accumuler les
                        formations et les missions.
                        J’y ai acquis de nombreuses
                        compétences très diverses,
                        et maintenant je recherche
                        la stabilité d’un CDl.
                    </p>
                </div>
            </div>
            <div class="half-column">
                <div class="quarter-column">
                    <div class="column-title">
                        <h2>Atouts</h2>
                    </div>
                    <div class="column-content">
                        <div id="english" class="atouts small">
                            <p>Anglais courant - C2</p>
                            <p>Multiples voyages à l'étranger en 3 ans</p>
                        </div>
                        <div id="teamwork" class="atouts small">
                            <p>Travail en équipe</p>
                            <p>Une valeur des EEDF</p>
                        </div>
                        <div id="computer" class="atouts small">
                            <p>lnformatique</p>
                            <p>Full stack, Adobe & Hardware</p>
                        </div>
                        <div id="creativity" class="atouts">
                            <p>Créativité</p>
                        </div>
                        <div id="pedagogy" class="atouts">
                            <p>Pédagogie</p>
                        </div>
                    </div>
                </div>
                <div class="column-title">
                    <h2>lntérêts</h2>
                </div>
                <div class="column-content">
                    <p class="mg-b-5">Randonnée : Mont Blanc,
                        Grand Canyon, lslande...</p>
                    <p>Photographie : depuis 9 ans
                        pratique intensive</p>
                </div>
            </div>
        </div>
    </div>
@endsection