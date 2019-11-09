@extends ("layouts.CV")

@section ("CSS")
    <link href="{{ mix('/css/CV.css') }}" rel="stylesheet" media="all">
@endsection

@section('column')
    <div id="column-container">
        <div id="column">
            <div class="half-column">
                <div class="column-content">
                        <div id="Photo-CV">
                            <a href="/storage/CV/Photo-CV.jpg">
                                <img src="/storage/CV/Photo-CV.jpg" alt="Photo de mon CV">
                            </a>
                        </div>
                        <p>29 ans +33 6 76 71 06 30</p>
                        <a href="mailto:contact@muller-clement.com">contact@muller-clement.com</a>
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
                        la stabilité d’un CDI.
                    </p>
                </div>
            </div>
            <div class="half-column">
                <div class="column-title">
                    <h2>Atouts</h2>
                </div>
                <div class="column-content">
                    <div id="english" class="atouts">
                        <h3>Anglais courant - C2</h3>
                        <p>Mulitples voyages à l'étranger en 3 ans</p>
                    </div>
                    <div id="teamwork" class="atouts">
                        <h3>Travail en équipe</h3>
                        <p>Une valeur des EEDF</p>
                    </div>
                    <div id="computer" class="atouts">
                        <h3>Informatique</h3>
                        <p>Full stack, Adobe & Hardware</p>
                    </div>
                    <div id="creativity" class="atouts">
                        <h3>Créativité</h3>
                    </div>
                    <div id="pedagogy" class="atouts">
                        <h3>Pédagogie</h3>
                    </div>
                </div>
                <div class="column-title">
                    <h2>Intérêts</h2>
                </div>
                <div class="column-content">
                    <p>Randonnée : Mont Blanc,
                        Grand Canyon, Islande...</p>
                    <p>Photographie : depuis 9 ans
                        pratique intensive</p>
                </div>
            </div>
        </div>
    </div>
@endsection