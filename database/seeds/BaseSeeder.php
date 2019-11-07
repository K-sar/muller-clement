<?php

use Illuminate\Database\Seeder;
use App\Base;

class BaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Base::create(['name' => 'CV',
                        'description' => 'Mon CV, disponible en PDF. Prochainement converti en html pour un affichage responsive, et dans la foulée je mettrais aussi la version anglaise',
                        'link' => 'CV',
                        'miniature' => '5955096ece360d5f1018d704e53dca1c.jpg',
                        'ordre' => 1,
            ]);
        Base::create(['name' => 'Portfolio',
                        'description' => 'Ensemble des sites web sur lesquels j\'ai travaillé, dans le cadre de ma formation et aussi après',
                        'link' => 'portfolio.index',
                        'miniature' => 'e10b2fa06e96f5cfe8dfaea9d73ea82a.jpg',
                        'ordre' => 2,
        ]);
        Base::create(['name' => 'La galerie',
                        'description' => 'Photographe amateur depuis... longtemps. Retrouvez toutes mes photos ici!',
                        'link' => 'folder.index',
                        'miniature' => '',
                        'ordre' => 3,
        ]);
    }
}
