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
        Portfolio::create(['name' => 'WebAgency', 'picture' => '0', 'link' => 'https://www.muller-clement.com/WebAgency/']);
        Portfolio::create(['name' => 'Office du Tourisme de Strasbourg', 'picture' => '0', 'link' => 'https://www.strasbourg.muller-clement.com/']);
        Portfolio::create(['name' => 'Velo\'v', 'picture' => '0', 'link' => 'https://www.muller-clement.com/velo-v/']);
        Portfolio::create(['name' => 'Billet simple pour l\'Alaska', 'picture' => '0', 'link' => 'https://www.muller-clement.com/Forteroche/']);
    }
}
