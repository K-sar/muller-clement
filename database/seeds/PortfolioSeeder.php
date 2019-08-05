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
        Portfolio::create(['name' => 'WebAgency', 'slug' => 'WebAgency', 'description' => '0', 'picture' => '0', 'link' => 'https://www.muller-clement.com/WebAgency/']);
        Portfolio::create(['name' => 'Office du Tourisme de Strasbourg', 'slug' => 'Office_du_Tourisme_de_Strasbourg', 'description' => '0', 'picture' => '0', 'link' => 'https://www.strasbourg.muller-clement.com/']);
        Portfolio::create(['name' => 'Velo\'v', 'slug' => 'Velo\'v', 'description' => '0', 'picture' => '0', 'link' => 'https://www.muller-clement.com/velo-v/']);
        Portfolio::create(['name' => 'Billet simple pour l\'Alaska', 'slug' => 'Billet_simple_pour_l\'Alaska', 'description' => '0', 'picture' => '0', 'link' => 'https://www.muller-clement.com/Forteroche/']);
    }
}
