<?php

use Illuminate\Database\Seeder;
use App\Portfolio;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Portfolio::create(['name' => 'WebAgency',
                            'slug' => 'WebAgency',
                            'description' => 'Premier projet de formation du parcours Développeur Web d\'Open Classrooms, "Intégrez la maquette du site d\'une agence web", uniquement en HTML 5 et CSS 3',
                            'picture' => 'f1de661dad686bbc9b4caa92b4dff26b.jpg',
                            'link' => 'https://www.muller-clement.com/WebAgency/']);
        Portfolio::create(['name' => 'Office du Tourisme de Strasbourg',
                            'slug' => 'Office_du_Tourisme_de_Strasbourg',
                            'description' => 'Deuxième projet de formation du parcours Développeur Web d\'Open Classrooms, "Créez un site en personnalisant un thème WordPress", sur WordPress donc, avec des plugins mais sans toucher au PHP',
                            'picture' => '8b626ac4aed62aa3c0b4ffecc023f0a2.jpg',
                            'link' => 'https://www.strasbourg.muller-clement.com/']);
        Portfolio::create(['name' => 'Velo\'v',
                            'slug' => 'Velo\'v',
                            'description' => 'Troisième projet de formation du parcours Développeur Web d\'Open Classrooms, "	Concevez une carte interactive de location de vélos", en JavaScript, HTML5, CSS3 et en utilisant les API de Google Map et JCDecaux',
                            'picture' => '60966f0ae9c33289e83130ded40bbfdd.jpg',
                            'link' => 'https://www.muller-clement.com/velo-v/']);
        Portfolio::create(['name' => 'Billet simple pour l\'Alaska',
                            'slug' => 'Billet_simple_pour_l\'Alaska',
                            'description' => 'Quatrième projet de formation du parcours Développeur Web d\'Open Classrooms, "Créez un blog pour un écrivain", en PHP, sans utiliser de framework',
                            'picture' => 'f7535776797f954b988ddc9575832bf9.jpg',
                            'link' => 'https://www.muller-clement.com/Forteroche/']);
        Portfolio::create(['name' => 'Clément Muller',
                            'slug' => 'Clement_Muller',
                            'description' => 'Dernier projet de formation du parcours Développeur Web d\'Open Classrooms, "Présentez librement un projet personnel", projet synthèse de la formation, donc en HTML3, CSS5, Javascript et PHP. J\'ai donc fait mon propre site, ce site, donc, et j\'en ai de plus profité pour découvrir Laravel',
                            'picture' => 'c4e85dcf547ed5ac0501d9007a7da5eb.jpg',
                            'link' => '/']);
    }
}
